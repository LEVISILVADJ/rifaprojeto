<?php
// Decodded

require_once 'config.php';
error_log('Webhook:'.json_encode($_GET));
$notfy = $_GET['notify'];

if ($notfy == 'mercadopago') {
    $json_event = file_get_contents('php://input', true);
    $event = json_decode($json_event);
    $mercadopago_access_token = $_settings->info('mercadopago_access_token');
    $enable_pixel = $_settings->info('enable_pixel');
    $facebook_access_token = $_settings->info('facebook_access_token');
    $facebook_pixel_id = $_settings->info('facebook_pixel_id');

    if (isset($event->type) == 'payment') {
        $url = 'https://api.mercadopago.com/v1/payments/' . $event->data->id . '';
        $headers = ['Accept: application/json', 'Authorization: Bearer ' . $mercadopago_access_token];
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resposta = curl_exec($ch);
        curl_close($ch);
        $payment_info = json_decode($resposta, true);
        $payment_id = $payment_info['id'];
        $status = $payment_info['status'];
        $payment_type = $payment_info['payment_type_id'];
        $pedido_id = $payment_info['external_reference'];
        $qry = $conn->query('SELECT o.status, o.product_id, o.total_amount, o.quantity, c.firstname, c.lastname, c.phone, o.referral_id' . "\r\n\t\t\t" . 'FROM order_list o' . "\r\n\t\t\t" . 'INNER JOIN customer_list c ON o.customer_id = c.id' . "\r\n\t\t\t" . 'WHERE o.id = \'' . $pedido_id . '\'');

        if (0 < $qry->num_rows) {
            $row = $qry->fetch_assoc();
            $status_order = $row['status'];
            $product_id = $row['product_id'];
            $quantity = $row['quantity'];
            $total_amount = $row['total_amount'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $phone = '55' . $row['phone'] . '';
            $ref = $row['referral_id'];
        }

        $product_list = $conn->query("\r\n\t\t\t" . 'SELECT pending_numbers, paid_numbers, qty_numbers' . "\r\n\t\t\t" . 'FROM product_list' . "\r\n\t\t\t" . 'WHERE id = \'' . $product_id . '\'' . "\r\n\t\t\t");

        if (0 < $product_list->num_rows) {
            $row = $product_list->fetch_assoc();
            $pendingNumbers = $row['pending_numbers'];
            $updatePending = $pendingNumbers - $quantity;
            $paidNumbers = $row['paid_numbers'];
            $updatePaid = $paidNumbers + $quantity;
            $qty_numbers = $row['qty_numbers'];
        }

        if ($ref) {
            $referral = $conn->query('SELECT * FROM referral WHERE referral_code = \'' . $ref . '\'');

            if (0 < $referral->num_rows) {
                $row = $referral->fetch_assoc();
                $status_affiliate = $row['status'];
                $percentage_affiliate = $row['percentage'];
            }
        }

        if ($status == 'approved') {
            if ($status_order == '1') {
                corrigir_duplicidade($pedido_id,$conn);
                date_default_timezone_set('America/Sao_Paulo');
                $payment_date = date('Y-m-d H:i:s');
                $sql_ol = 'UPDATE order_list SET status = \'2\', date_updated = \'' . $payment_date . '\', whatsapp_status = \'\' WHERE id = \'' . $pedido_id . '\'';
                $conn->query($sql_ol);
                $sql_pl = 'UPDATE product_list SET pending_numbers = \'' . $updatePending . '\', paid_numbers = \'' . $updatePaid . '\' WHERE id = \'' . $product_id . '\'';
                $conn->query($sql_pl);

                if ($ref) {
                    if ($ref) {
                        if ($status_affiliate == 1) {
                            $value = $total_amount * $percentage_affiliate;
                            $value = $value / 100;
                            $aff_sql = 'UPDATE referral SET amount_pending = amount_pending + ' . $value . ' WHERE referral_code = ' . $ref;
                            $conn->query($aff_sql);
                        }
                    }
                }

                $dados = ['first_name' => $firstname, 'last_name' => $lastname, 'phone' => $phone, 'id' => $pedido_id, 'total_amount' => $total_amount];
                send_event_pixel('Purchase', $dados);
                order_email($_settings->info('email_purchase'), '[' . $_settings->info('name') . '] - Pagamento aprovado', $pedido_id);
            }
        }
    }
}
if ($notfy == 'greenpag') {
    $json_event = file_get_contents('php://input', true);
    $pixPaymentData = json_decode($json_event, true);
    //$pixPaymentData = json_decode(file_get_contents('php://input'));
    $enable_pixel = $_settings->info('enable_pixel');
    $facebook_access_token = $_settings->info('facebook_access_token');
    $facebook_pixel_id = $_settings->info('facebook_pixel_id');

    if ($pixPaymentData) {



        $txID = $pixPaymentData['transaction_id'];
        $qry = $conn->query('SELECT o.status, o.product_id, o.total_amount, o.quantity, c.firstname, c.lastname, c.phone, o.referral_id' . "\r\n\t\t\t\t" . 'FROM order_list o' . "\r\n\t\t\t\t" . 'INNER JOIN customer_list c ON o.customer_id = c.id' . "\r\n\t\t\t\t" . 'WHERE o.txid = \'' . $txID . '\'');

        if (0 < $qry->num_rows) {
            $row = $qry->fetch_assoc();
            $status_order = $row['status'];
            $product_id = $row['product_id'];
            $quantity = $row['quantity'];
            $total_amount = $row['total_amount'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $phone = '55' . $row['phone'] . '';
            $ref = $row['referral_id'];
        }

        $product_list = $conn->query("\r\n\t\t\t\t" . 'SELECT pending_numbers, paid_numbers, qty_numbers' . "\r\n\t\t\t\t" . 'FROM product_list' . "\r\n\t\t\t\t" . 'WHERE id = \'' . $product_id . '\'' . "\r\n\t\t\t\t");

        if (0 < $product_list->num_rows) {
            $row = $product_list->fetch_assoc();
            $pendingNumbers = $row['pending_numbers'];
            $updatePending = $pendingNumbers - $quantity;
            $paidNumbers = $row['paid_numbers'];
            $updatePaid = $paidNumbers + $quantity;
            $qty_numbers = $row['qty_numbers'];
        }

        if ($ref) {
            $referral = $conn->query('SELECT * FROM referral WHERE referral_code = \'' . $ref . '\'');

            if (0 < $referral->num_rows) {
                $row = $referral->fetch_assoc();
                $status_affiliate = $row['status'];
                $percentage_affiliate = $row['percentage'];
            }
        }

        if ($status_order == '1') {
            corrigir_duplicidade($pedido_id,$conn);
            date_default_timezone_set('America/Sao_Paulo');
            $payment_date = date('Y-m-d H:i:s');
            $sql_ol = 'UPDATE order_list SET status = \'2\', date_updated = \'' . $payment_date . '\', whatsapp_status = \'\' WHERE txid = \'' . $txID . '\'';
            $conn->query($sql_ol);
            $sql_pl = 'UPDATE product_list SET pending_numbers = \'' . $updatePending . '\', paid_numbers = \'' . $updatePaid . '\' WHERE id = \'' . $product_id . '\'';
            $conn->query($sql_pl);

            if ($ref) {
                if ($ref) {
                    if ($status_affiliate == 1) {
                        $value = $total_amount * $percentage_affiliate;
                        $value = $value / 100;
                        $aff_sql = 'UPDATE referral SET amount_pending = amount_pending + ' . $value . ' WHERE referral_code = ' . $ref;
                        $conn->query($aff_sql);
                    }
                }
            }

            $dados = ['first_name' => $firstname, 'last_name' => $lastname, 'phone' => $phone, 'id' => $pedido_id, 'total_amount' => $total_amount];
            send_event_pixel('Purchase', $dados);
            order_email($_settings->info('email_purchase'), '[' . $_settings->info('name') . '] - Pagamento aprovado', $pedido_id);
        }
    }
}
if ($notfy == 'paggue') {
    $json_event = file_get_contents('php://input', true);
    $event = json_decode($json_event, true);
    $enable_pixel = $_settings->info('enable_pixel');
    $facebook_access_token = $_settings->info('facebook_access_token');
    $facebook_pixel_id = $_settings->info('facebook_pixel_id');
    $payment_id = $event['external_id'];
    $status = $event['status'];
    $pedido_id = $event['external_id'];
    $qry = $conn->query('SELECT o.status, o.product_id, o.total_amount, o.quantity, c.firstname, c.lastname, c.phone, o.referral_id' . "\r\n\t\t" . 'FROM order_list o' . "\r\n\t\t" . 'INNER JOIN customer_list c ON o.customer_id = c.id' . "\r\n\t\t" . 'WHERE o.id = \'' . $pedido_id . '\'');

    if (0 < $qry->num_rows) {
        $row = $qry->fetch_assoc();
        $status_order = $row['status'];
        $product_id = $row['product_id'];
        $quantity = $row['quantity'];
        $total_amount = $row['total_amount'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $phone = '55' . $row['phone'] . '';
        $ref = $row['referral_id'];
    }

    $product_list = $conn->query("\r\n\t\t" . 'SELECT pending_numbers, paid_numbers, qty_numbers' . "\r\n\t\t" . 'FROM product_list' . "\r\n\t\t" . 'WHERE id = \'' . $product_id . '\'' . "\r\n\t\t");

    if (0 < $product_list->num_rows) {
        $row = $product_list->fetch_assoc();
        $pendingNumbers = $row['pending_numbers'];
        $updatePending = $pendingNumbers - $quantity;
        $paidNumbers = $row['paid_numbers'];
        $updatePaid = $paidNumbers + $quantity;
        $qty_numbers = $row['qty_numbers'];
    }

    if ($ref) {
        $referral = $conn->query('SELECT * FROM referral WHERE referral_code = \'' . $ref . '\'');

        if (0 < $referral->num_rows) {
            $row = $referral->fetch_assoc();
            $status_affiliate = $row['status'];
            $percentage_affiliate = $row['percentage'];
        }
    }

    if ($status == '1') {
        if ($status_order == '1') {
            corrigir_duplicidade($pedido_id,$conn);
            date_default_timezone_set('America/Sao_Paulo');
            $payment_date = date('Y-m-d H:i:s');
            $sql_ol = 'UPDATE order_list SET status = \'2\', date_updated = \'' . $payment_date . '\', whatsapp_status = \'\' WHERE id = \'' . $pedido_id . '\'';
            $conn->query($sql_ol);
            $sql_pl = 'UPDATE product_list SET pending_numbers = \'' . $updatePending . '\', paid_numbers = \'' . $updatePaid . '\' WHERE id = \'' . $product_id . '\'';
            $conn->query($sql_pl);

            if ($ref) {
                if ($ref) {
                    if ($status_affiliate == 1) {
                        $value = $total_amount * $percentage_affiliate;
                        $value = $value / 100;
                        $aff_sql = 'UPDATE referral SET amount_pending = amount_pending + ' . $value . ' WHERE referral_code = ' . $ref;
                        $conn->query($aff_sql);
                    }
                }
            }

            $dados = ['first_name' => $firstname, 'last_name' => $lastname, 'phone' => $phone, 'id' => $pedido_id, 'total_amount' => $total_amount];
            send_event_pixel('Purchase', $dados);
            order_email($_settings->info('email_purchase'), '[' . $_settings->info('name') . '] - Pagamento aprovado', $pedido_id);
        }
    }
}


if ($notfy == 'gerencianet') {
    $postData = json_decode(file_get_contents('php://input'));
    $enable_pixel = $_settings->info('enable_pixel');
    $facebook_access_token = $_settings->info('facebook_access_token');
    $facebook_pixel_id = $_settings->info('facebook_pixel_id');

    if ($postData) {
        if (isset($postData->evento) && isset($postData->data_criacao)) {
            header('HTTP/1.0 200 OK');
            exit();
        }

        $pixPaymentData = $postData->pix;

        if (empty($pixPaymentData)) {
            exit();
        } else {
            $txID = $pixPaymentData[0]->txid;
            $e2eID = $pixPaymentData[0]->endToEndId;
            $qry = $conn->query('SELECT o.status, o.product_id, o.total_amount, o.quantity, c.firstname, c.lastname, c.phone, o.referral_id' . "\r\n\t\t\t\t" . 'FROM order_list o' . "\r\n\t\t\t\t" . 'INNER JOIN customer_list c ON o.customer_id = c.id' . "\r\n\t\t\t\t" . 'WHERE o.txid = \'' . $txID . '\'');

            if (0 < $qry->num_rows) {
                $row = $qry->fetch_assoc();
                $status_order = $row['status'];
                $product_id = $row['product_id'];
                $quantity = $row['quantity'];
                $total_amount = $row['total_amount'];
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $phone = '55' . $row['phone'] . '';
                $ref = $row['referral_id'];
            }

            $product_list = $conn->query("\r\n\t\t\t\t" . 'SELECT pending_numbers, paid_numbers, qty_numbers' . "\r\n\t\t\t\t" . 'FROM product_list' . "\r\n\t\t\t\t" . 'WHERE id = \'' . $product_id . '\'' . "\r\n\t\t\t\t");

            if (0 < $product_list->num_rows) {
                $row = $product_list->fetch_assoc();
                $pendingNumbers = $row['pending_numbers'];
                $updatePending = $pendingNumbers - $quantity;
                $paidNumbers = $row['paid_numbers'];
                $updatePaid = $paidNumbers + $quantity;
                $qty_numbers = $row['qty_numbers'];
            }

            if ($ref) {
                $referral = $conn->query('SELECT * FROM referral WHERE referral_code = \'' . $ref . '\'');

                if (0 < $referral->num_rows) {
                    $row = $referral->fetch_assoc();
                    $status_affiliate = $row['status'];
                    $percentage_affiliate = $row['percentage'];
                }
            }

            if ($status_order == '1') {
                corrigir_duplicidade($pedido_id);
                date_default_timezone_set('America/Sao_Paulo');
                $payment_date = date('Y-m-d H:i:s');
                $sql_ol = 'UPDATE order_list SET status = \'2\', date_updated = \'' . $payment_date . '\', whatsapp_status = \'\' WHERE txid = \'' . $txID . '\'';
                $conn->query($sql_ol);
                $sql_pl = 'UPDATE product_list SET pending_numbers = \'' . $updatePending . '\', paid_numbers = \'' . $updatePaid . '\' WHERE id = \'' . $product_id . '\'';
                $conn->query($sql_pl);

                if ($ref) {
                    if ($ref) {
                        if ($status_affiliate == 1) {
                            $value = $total_amount * $percentage_affiliate;
                            $value = $value / 100;
                            $aff_sql = 'UPDATE referral SET amount_pending = amount_pending + ' . $value . ' WHERE referral_code = ' . $ref;
                            $conn->query($aff_sql);
                        }
                    }
                }

                $dados = ['first_name' => $firstname, 'last_name' => $lastname, 'phone' => $phone, 'id' => $pedido_id, 'total_amount' => $total_amount];
                send_event_pixel('Purchase', $dados);
                order_email($_settings->info('email_purchase'), '[' . $_settings->info('name') . '] - Pagamento aprovado', $pedido_id);
            }
        }
    }
}
