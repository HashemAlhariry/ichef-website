const recipeController = require('./controllers/recipeController');
const db = require('./database');
const bodyParser = require('body-parser');
const express = require('express');
const app = express();
// const session = require('express-session');
// const fileUpload = require('express-fileupload');


// parser
// app.use(session({cookieName: 'session', secret:'$0_$3cR37_K3Y'}));
// app.use(fileUpload());
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());

//template engine
app.set('view engine', 'ejs');
app.use(function (req, res, next) {
    // res.locals.cid = req.session.cid;
    // res.locals.hrid = req.session.hrid;
    next();
});

//static files
app.use(express.static('./public'));

// fire controller
recipeController(app);

// handle 404
app.use(function (req, res, next) {
    res.status(404);
    res.render('404', { url: req.url });
});

app.listen(3000);
console.log(`Running on ${3000}`);