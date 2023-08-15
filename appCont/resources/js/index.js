import express from 'express';
import mysql from 'mysql';
import bodyParser from 'body-parser';

const app = express();
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());
app.use((req, res, next) => {
    res.setHeader('Access-Control-Allow-Origin', '*');
    res.setHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE');
    res.setHeader('Access-Control-Allow-Headers', 'Content-Type, x-requested-with'); // Agregamos la cabecera 'x-requested-with'
    next();
  });

const connection = mysql.createConnection({
    host: 'localhost',
    user: 'new343i',
    password: 'New343117',
    database: 'bal'
});

connection.connect(error => {
    if (error) {
      console.error('Error al conectar a la base de datos:', error);
    } else {
      console.log('Conexión exitosa a la base de datos');
    }
});

app.get('/tipoC', (req, res) => {
    const query = 'SELECT * FROM tipoConcep';

    connection.query(query, (error, results) => {
      if (error){
        console.error('Error al obtener los datos:', error);
        res.status(500).json({ error: 'Error al obtener los datos' });
      } else {
        res.json(results);
      }
    })
});

app.get('/')

const port = 9000; // Puedes ajustar el puerto según tu preferencia

app.listen(port, () => {
console.log(`Servidor backend escuchando en el puerto ${port}`);
});
