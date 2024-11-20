const express = require('express');
const nodemailer = require('nodemailer');
const bodyParser = require('body-parser');
const cors = require('cors'); // Importa el paquete cors
const app = express();

app.use(cors()); // Usa cors como middleware
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());

app.post('/send-email', (req, res) => {
    const email = req.body.email;

    const transporter = nodemailer.createTransport({
        host: 'mailtrap.io',
        port: 2525,
        secure: false, // Usa TLS
        auth: {
            user: 'f66a4e5cf903f0',
            pass: 'b19d72b4f538cb'
        }
    });

    const mailOptions = {
        from: 'bazargml@gmail.com',
        to: email,
        subject: 'Confirmación de compra',
        text: 'Gracias, ¡Felicidades por tu compra! Hemos enviado un mensaje de confirmación a tu correo.'
    };

    transporter.sendMail(mailOptions, (error, info) => {
        if (error) {
            return res.status(500).send(error.toString());
        }
        res.status(200).send('Correo enviado: ' + info.response);
    });
});

app.listen(3001, () => {
    console.log('Servidor iniciado en el puerto 3001');
});
