const mysql = require('mysql');
const express = require('express');
const session = require('express-session');
const path = require('path');

const app = express();

// MySQL connection
const connection = mysql.createConnection({
    host     : 'localhost',
    user     : 'root',
    password : 'aditya', // change if you have a password
    database : 'nodelogin'
});

// Connect DB
connection.connect(err => {
    if (err) {
        console.error('❌ MySQL connection error: ' + err.stack);
        return;
    }
    console.log('✅ Connected to MySQL as ID ' + connection.threadId);
});

// Middleware
app.use(session({
    secret: 'secret', 
    resave: true,
    saveUninitialized: true
}));
app.use(express.json());
app.use(express.urlencoded({ extended: true }));
app.use(express.static(path.join(__dirname, 'static')));

// Routes
// Home - login page
app.get('/', function(request, response) {
    response.sendFile(path.join(__dirname + '/login.html'));
});

// Authenticate
app.post('/auth', function(request, response) {
    let username = request.body.username;
    let password = request.body.password;

    if (username && password) {
        connection.query(
            'SELECT * FROM accounts WHERE username = ? AND password = ?', 
            [username, password], 
            function(error, results) {
                if (error) throw error;
                if (results.length > 0) {
                    request.session.loggedin = true;
                    request.session.username = username;
                    response.redirect('/home');
                } else {
                    response.send('Incorrect Username and/or Password!');
                }
                response.end();
            }
        );
    } else {
        response.send('Please enter Username and Password!');
        response.end();
    }
});

// Home page after login
app.get('/home', function(request, response) {
    if (request.session.loggedin) {
        response.send('Welcome back, ' + request.session.username + '!');
    } else {
        response.send('Please login to view this page!');
    }
    response.end();
});

// Start server
app.listen(3000, () => {
    console.log('🚀 Server running on http://localhost:3000/');
});
