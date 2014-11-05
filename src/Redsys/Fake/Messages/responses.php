<?php
return array(
    '000' => array(
        'code' => '000',
        'message' => 'TRANSACCION APROBADA',
        'detail' => 'Transacción autorizada por el banco emisor de la tarjeta'
    ),
    '001' => array(
        'code' => '001',
        'message' => 'TRANSACCION APROBADA PREVIA IDENTIFICACION DE TITULAR',
        'detail' => 'Código exclusivo para transacciones Verified by Visa o MasterCard SecureCode. La transacción ha sido autorizada y, además, el banco emisor nos informa que ha autenticado correctamente la identidad del titular de la tarjeta.'
    ),
    '002 - 099' => array(
        'code' => '002 - 099',
        'message' => 'TRANSACCION APROBADA',
        'detail' => 'Transacción autorizada por el banco emisor.'
    ),
    '101' => array(
        'code' => '101',
        'message' => 'TARJETA CADUCADA',
        'detail' => 'Transacción denegada porque la fecha de caducidad de la tarjeta que se ha informado en el pago, es anterior a la actualmente vigente.'
    ),
    '102' => array(
        'code' => '102',
        'message' => 'TARJETA BLOQUEDA TRANSITORIAMENTE O BAJO SOSPECHA DE FRAUDE',
        'detail' => 'Tarjeta bloqueada transitoriamente por el banco emisor o bajo sospecha de fraude.'
    ),
    '104' => array(
        'code' => '104',
        'message' => 'OPERACIÓN NO PERMITIDA',
        'detail' => 'Operación no permitida para ese tipo de tarjeta.'
    ),
    '106' => array(
        'code' => '106',
        'message' => 'NUM. INTENTOS EXCEDIDO',
        'detail' => 'Excedido el número de intentos con PIN erróneo.'
    ),
    '107' => array(
        'code' => '107',
        'message' => 'CONTACTAR CON EL EMISOR',
        'detail' => 'El banco emisor no permite una autorización automática. Es necesario contactar telefónicamente con su centro autorizador para obtener una aprobación manual.'
    ),
    '109' => array(
        'code' => '109',
        'message' => 'IDENTIFICACIÓN INVALIDA DEL COMERCIO O TERMINAL',
        'detail' => 'Denegada porque el comercio no está correctamente dado de alta en los sistemas internacionales de tarjetas.'
    ),
    '110' => array(
        'code' => '110',
        'message' => 'IMPORTE INVALIDO',
        'detail' => 'El importe de la transacción es inusual para el tipo de comercio que solicita la autorización de pago.'
    ),
    '114' => array(
        'code' => '114',
        'message' => 'TARJETA NO SOPORTA EL TIPO DE OPERACIÓN SOLICITADO',
        'detail' => 'Operación no permitida para ese tipo de tarjeta.'
    ),
    '116' => array(
        'code' => '116',
        'message' => 'DISPONIBLE INSUFICIENTE',
        'detail' => 'El titular de la tarjeta no dispone de suficiente crédito para atender el pago.'
    ),
    '118' => array(
        'code' => '118',
        'message' => 'TARJETA NO REGISTRADA',
        'detail' => 'Tarjeta inexistente o no dada de alta por banco emisor.'
    ),
    '125' => array(
        'code' => '125',
        'message' => 'TARJETA NO EFECTIVA',
        'detail' => 'Tarjeta inexistente o no dada de alta por banco emisor.'
    ),
    '129' => array(
        'code' => '129',
        'message' => 'ERROR CVV2/CVC2',
        'detail' => 'El código CVV2/CVC2 (los tres dígitos del reverso de la tarjeta) informado por el comprador es erróneo.'
    ),
    '167' => array(
        'code' => '167',
        'message' => 'CONTACTAR CON EL EMISOR: SOSPECHA DE FRAUDE',
        'detail' => 'Debido a una sospecha de que la transacción es fraudulenta el banco emisor no permite una autorización automática. Es necesario contactar telefónicamente con su centro autorizador para obtener una aprobación manual.'
    ),
    '180' => array(
        'code' => '180',
        'message' => 'TARJETA AJENA AL SERVICIO',
        'detail' => 'Operación no permitida para ese tipo de tarjeta.'
    ),
    '181-182' => array(
        'code' => '181-182',
        'message' => 'TARJETA CON RESTRICCIONES DE DEBITO O CREDITO',
        'detail' => 'Tarjeta bloqueada transitoriamente por el banco emisor.'
    ),
    '184' => array(
        'code' => '184',
        'message' => 'ERROR EN AUTENTICACION',
        'detail' => 'Código exclusivo para transacciones Verified by Visa o MasterCard SecureCode. La transacción ha sido denegada porque el banco emisor no pudo autenticar debidamente al titular de la tarjeta.'
    ),
    '190' => array(
        'code' => '190',
        'message' => 'DENEGACION SIN ESPECIFICAR EL MOTIVO',
        'detail' => 'Transacción denegada por el banco emisor pero sin que este dé detalles acerca del motivo.'
    ),
    '191' => array(
        'code' => '191',
        'message' => 'FECHA DE CADUCIDAD ERRONEA',
        'detail' => 'Transacción denegada porque la fecha de caducidad de la tarjeta que se ha informado en el pago, no se corresponde con la actualmente vigente.'
    ),
    '201' => array(
        'code' => '201',
        'message' => 'TARJETA CADUCADA',
        'detail' => 'Transacción denegada porque la fecha de caducidad de la tarjeta que se ha informado en el pago, es anterior a la actualmente vigente. Además, el banco emisor considera que la tarjeta está en una situación de posible fraude.'
    ),
    '202' => array(
        'code' => '202',
        'message' => 'TARJETA BLOQUEDA TRANSITORIAMENTE O BAJO SOSPECHA DE FRAUDE',
        'detail' => 'Tarjeta bloqueada transitoriamente por el banco emisor o bajo sospecha de fraude. Además, el banco emisor considera que la tarjeta está en una situación de posible fraude.'
    ),
    '204' => array(
        'code' => '204',
        'message' => 'OPERACION NO PERMITIDA',
        'detail' => 'Operación no permitida para ese tipo de tarjeta. Además, el banco emisor considera que la tarjeta está en una situación de posible fraude.'
    ),
    '207' => array(
        'code' => '207',
        'message' => 'CONTACTAR CON EL EMISOR',
        'detail' => 'El banco emisor no permite una autorización automática. Es necesario contactar telefónicamente con su centro autorizador para obtener una aprobación manual. Además, el banco emisor considera que la tarjeta está en una situación de posible fraude.'
    ),
    '208 - 209' => array(
        'code' => '208 - 209',
        'message' => 'TARJETA PERDIDA O ROBADA',
        'detail' => 'Tarjeta bloqueada por el banco emisor debido a que el titular le ha manifestado que le ha sido robada o perdida. Además, el banco emisor considera que la tarjeta está en una situación de posible fraude.'
    ),
    '280' => array(
        'code' => '280',
        'message' => 'ERROR CVV2/CVC2',
        'detail' => 'Código exclusivo para transacciones en las que se solicita el código de 3 dígitos CVV2 (tarj.Visa) o CVC2 (tarj.MasterCard) del reverso de la tarjeta. El código CVV2/CVC2 informado por el comprador es erróneo. Además, el banco emisor considera que la tarjeta está en una situación de posible fraude.'
    ),
    '290' => array(
        'code' => '290',
        'message' => 'DENEGACION SIN ESPECIFICAR EL MOTIVO',
        'detail' => 'Transacción denegada por el banco emisor pero sin que este dé detalles acerca del motivo. Además, el banco emisor considera que la tarjeta está en una situación de posible fraude.'
    ),
    '400' => array(
        'code' => '400',
        'message' => 'ANULACION ACEPTADA',
        'detail' => 'Transacción de anulación o retrocesión parcial aceptada por el banco emisor.'
    ),
    '480' => array(
        'code' => '480',
        'message' => 'NO SE ENCUENTRA LA OPERACIÓN ORIGINAL O TIME-OUT EXCEDIDO',
        'detail' => 'La anulación o retrocesión parcial no ha sido aceptada porque no se ha localizado la operación original, o bien, porque el banco emisor no ha dado respuesta dentro del time-out predefinido.'
    ),
    '481' => array(
        'code' => '481',
        'message' => 'ANULACION ACEPTADA',
        'detail' => 'Transacción de anulación o retrocesión parcial aceptada por el banco emisor. No obstante, la respuesta del banco emisor se ha recibido con mucha demora, fuera del time-out predefinido.'
    ),
    '500' => array(
        'code' => '500',
        'message' => 'CONCILIACION ACEPTADA',
        'detail' => 'La transacción de conciliación ha sido aceptada por el banco emisor.'
    ),
    '501 - 503' => array(
        'code' => '501 - 503',
        'message' => 'NO ENCONTRADA LA OPERACION ORIGINAL O TIME-OUT EXCEDIDO',
        'detail' => 'La conciliación no ha sido aceptada porque no se ha localizado la operación original, o bien, porque el banco emisor no ha dado respuesta dentro del time-out predefinido.'
    ),
    '9928' => array(
        'code' => '9928',
        'message' => 'ANULACIÓN DE PREAUTORITZACIÓN REALIZADA POR EL SISTEMA',
        'detail' => 'El sistema ha anulado la preautorización diferida al haber pasado más de 72 horas.'
    ),
    '9929' => array(
        'code' => '9929',
        'message' => 'ANULACIÓN DE PREAUTORITZACIÓN REALIZADA POR EL COMERCIO',
        'detail' => 'La anulación de la preautorización ha sido aceptada'
    ),
    '904' => array(
        'code' => '904',
        'message' => 'COMERCIO NO REGISTRADO EN EL FUC',
        'detail' => 'Hay un problema en la configuración del código de comercio. Contactar con Banco Sabadell para solucionarlo.'
    ),
    '909' => array(
        'code' => '909',
        'message' => 'ERROR DE SISTEMA',
        'detail' => 'Error en la estabilidad de la plataforma de pagos de Banco Sabadell o en la de los sistemas de intercambio de Visa o MasterCard.'
    ),
    '912' => array(
        'code' => '912',
        'message' => 'EMISOR NO DISPONIBLE',
        'detail' => 'El centro autorizador del banco emisor no está operativo en estos momentos.'
    ),
    '913' => array(
        'code' => '913',
        'message' => 'TRANSMISION DUPLICADA',
        'detail' => 'Se ha procesado recientemente una transacción con el mismo número de pedido (Ds_Merchant_Order).'
    ),
    '916' => array(
        'code' => '916',
        'message' => 'IMPORTE DEMASIADO PEQUEÑO',
        'detail' => 'No es posible operar con este importe.'
    ),
    '928' => array(
        'code' => '928',
        'message' => 'TIME-OUT EXCEDIDO',
        'detail' => 'El banco emisor no da respuesta a la petición de autorización dentro del time-out predefinido.'
    ),
    '940' => array(
        'code' => '940',
        'message' => 'TRANSACCION ANULADA ANTERIORMENTE',
        'detail' => 'Se está solicitando una anulación o retrocesión parcial de una transacción que con anterioridad ya fue anulada.'
    ),
    '941' => array(
        'code' => '941',
        'message' => 'TRANSACCION DE AUTORIZACION YA ANULADA POR UNA ANULACION ANTERIOR',
        'detail' => 'Se está solicitando la confirmación de una transacción con un número de pedido (Ds_Merchant_Order) que se corresponde a una operación anulada anteriormente.'
    ),
    '942' => array(
        'code' => '942',
        'message' => 'TRANSACCION DE AUTORIZACION ORIGINAL DENEGADA',
        'detail' => 'Se está solicitando la confirmación de una transacción con un número de pedido (Ds_Merchant_Order) que se corresponde a una operación denegada.'
    ),
    '943' => array(
        'code' => '943',
        'message' => 'DATOS DE LA TRANSACCION ORIGINAL DISTINTOS',
        'detail' => 'Se está solicitando una confirmación errónea.'
    ),
    '944' => array(
        'code' => '944',
        'message' => 'SESION ERRONEA',
        'detail' => 'Se está solicitando la apertura de una tercera sesión. En el proceso de pago solo está permitido tener abiertas dos sesiones (la actual y la anterior pendiente de cierre).'
    ),
    '945' => array(
        'code' => '945',
        'message' => 'TRANSMISION DUPLICADA',
        'detail' => 'Se ha procesado recientemente una transacción con el mismo número de pedido (Ds_Merchant_Order).'
    ),
    '946' => array(
        'code' => '946',
        'message' => 'OPERACION A ANULAR EN PROCESO',
        'detail' => 'Se ha solicitada la anulación o retrocesión parcial de una transacción original que todavía está en proceso y pendiente de respuesta.'
    ),
    '947' => array(
        'code' => '947',
        'message' => 'TRANSMISION DUPLICADA EN PROCESO',
        'detail' => 'Se está intentando procesar una transacción con el mismo número de pedido (Ds_Merchant_Order) de otra que todavía está pendiente de respuesta.'
    ),
    '949' => array(
        'code' => '949',
        'message' => 'TERMINAL INOPERATIVO',
        'detail' => 'El número de comercio (Ds_Merchant_MerchantCode) o el de terminal (Ds_Merchant_Terminal) no están dados de alta o no son operativos.'
    ),
    '950' => array(
        'code' => '950',
        'message' => 'DEVOLUCION NO PERMITIDA',
        'detail' => 'La devolución no está permitida por regulación.'
    ),
    '965' => array(
        'code' => '965',
        'message' => 'VIOLACIÓN NORMATIVA',
        'detail' => 'Violación de la Normativa de Visa o Mastercard'
    ),
    '9064' => array(
        'code' => '9064',
        'message' => 'LONGITUD TARJETA INCORRECTA',
        'detail' => 'Nº posiciones de la tarjeta incorrecta'
    ),
    '9078' => array(
        'code' => '9078',
        'message' => 'NO EXISTE METODO DE PAGO',
        'detail' => 'Los tipos de pago definidos para el terminal (Ds_Merchant_Terminal) por el que se procesa la transacción, no permiten pagar con el tipo de tarjeta informado.'
    ),
    '9093' => array(
        'code' => '9093',
        'message' => 'TARJETA NO EXISTE',
        'detail' => 'Tarjeta inexistente.'
    ),
    '9094' => array(
        'code' => '9094',
        'message' => 'DENEGACION DE LOS EMISORES',
        'detail' => 'Operación denegada por parte de los emisoras internacionales'
    ),
    '9104' => array(
        'code' => '9104',
        'message' => 'OPER. SEGURA NO ES POSIBLE',
        'detail' => 'Comercio con autenticación obligatoria y titular sin clave de compra segura'
    ),
    '9142' => array(
        'code' => '9142',
        'message' => 'TIEMPO LÍMITE DE PAGO SUPERADO',
        'detail' => 'El titular de la tarjeta no se ha autenticado durante el tiempo máximo permitido.'
    ),
    '9218' => array(
        'code' => '9218',
        'message' => 'NO SE PUEDEN HACER OPERACIONES SEGURAS',
        'detail' => 'La entrada Operaciones no permite operaciones Seguras'
    ),
    '9253' => array(
        'code' => '9253',
        'message' => 'CHECK-DIGIT ERRONEO',
        'detail' => 'Tarjeta no cumple con el check-digit (posición 16 del número de tarjeta calculada según algoritmo de Luhn).'
    ),
    '9256' => array(
        'code' => '9256',
        'message' => 'PREAUTORITZACIONES NO HABILITADAS',
        'detail' => 'La tarjeta no puede hacer Preautorizaciones'
    ),
    '9261' => array(
        'code' => '9261',
        'message' => 'LÍMITE OPERATIVO EXCEDIDO',
        'detail' => 'La transacción excede el límite operativo establecido por Banco Sabadell'
    ),
    '9283' => array(
        'code' => '9283',
        'message' => 'SUPERA ALERTAS BLOQUANTES',
        'detail' => 'La operación excede las alertas bloqueantes, no se puede procesar'
    ),
    '9281' => array(
        'code' => '9281',
        'message' => 'SUPERA ALERTAS BLOQUEANTES',
        'detail' => 'La operación excede las alertas bloqueantes, no se puede procesar'
    ),
    '9912' => array(
        'code' => '9912',
        'message' => 'EMISOR NO DISPONIBLE',
        'detail' => 'El centro autorizador del banco emisor no está operativo en estos momentos.'
    ),
    '9913' => array(
        'code' => '9913',
        'message' => 'ERROR EN CONFIRMACION',
        'detail' => 'Error en la confirmación que el comercio envía al TPV Virtual (solo aplicable en la opción de sincronización SOAP)'
    ),
    '9914' => array(
        'code' => '9914',
        'message' => 'CONFIRMACION “KO”',
        'detail' => 'Confirmación “KO” del comercio (solo aplicable en la opción de sincronización SOAP)'
    ),
    '9915' => array(
        'code' => '9915',
        'message' => 'PAGO CANCELADO',
        'detail' => 'El usuario ha cancelado el pago'
    ),
    '9928' => array(
        'code' => '9928',
        'message' => 'AUTORIZACIÓN EN DIFERIDO ANULADA',
        'detail' => 'Anulación de autorización en diferido realizada por el SIS (proceso batch)'
    ),
    '9929' => array(
        'code' => '9929',
        'message' => 'AUTORIZACIÓN EN DIFERIDO ANULADA',
        'detail' => 'Anulación de autorización en diferido realizada por el comercio'
    ),
    '9997' => array(
        'code' => '9997',
        'message' => 'TRANSACCIÓN SIMULTÁNEA',
        'detail' => 'En el TPV Virtual se está procesando de forma simultánea otra operación con la misma tarjeta.'
    ),
    '9998' => array(
        'code' => '9998',
        'message' => 'ESTADO OPERACIÓN: SOLICITADA',
        'detail' => 'Estado temporal mientras la operación se procesa. Cuando la operación termine este código cambiará.'
    ),
    '9999' => array(
        'code' => '9999',
        'message' => 'ESTADO OPERACIÓN: AUTENTICANDO',
        'detail' => 'Estado temporal mientras el TPV realiza la autenticación del titular. Una vez finalizado este proceso el TPV asignará un nuevo código a la operación.'
    )
);
