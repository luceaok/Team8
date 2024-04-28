const express = require("express")
const mysql = require("mysql")
const bodyParser = require('body-parser')

const app = express()
const PORT = 3000

const connection = mysql.createConnection({
    host: "localhost", 
    user: "root", 
    password: "2222", 
    database: "team002"
})

connection.connect((err) => {
    if(err) throw err
    else
    {
    console.log("Connected to MySql Database!")
    }
})

app.use(bodyParser.json())

app.get('/api/chats', (req, res) => {
    connection.query("SELECT * FROM user", (err, result) => {
        if(err) throw err
        else
        {
        console.log(result)
        res.json(result)
        }
    })
})

app.get('/api/user', (req, res) => {
    connection.query("SELECT * FROM user", (err, result) => {
        if(err) throw err
        else
        {
        console.log(result)
        res.json(result)
        }
    })
})

app.set("ipaddr", "127.0.0.1")
app.set("port", 8080)

http.listen(8080, "127.0.0.1")
