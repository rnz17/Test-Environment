const mysql = require('mysql');

const connection = mysql.createConnection({
  host: 'localhost', // Replace with your database host
  user: 'root', // Replace with your database username
  password: '051703', // Replace with your database password
  database: 'zealia', // Replace with your database name
  port: 3306
});

connection.connect((err) => {
  if (err) {
    console.error('Error connecting to the database:', err.stack);
    return;
  }
  console.log('Connected to the database.');
});

const fetchData = () => {
  return new Promise((resolve, reject) => {
    const query = 'SELECT school_id, l_name, f_name, account_type, R, I, A, S, E, C, result FROM accounts'; // Replace with your table name
    connection.query(query, (error, results) => {
      if (error) {
        reject(error);
      } else {
        resolve(results);
      }
    });
  });
};

module.exports = { fetchData, connection };
