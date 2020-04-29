const recipeModel = require('../models/recipe');


module.exports = function(app) {
    // GET HANDLERS
    app.get('/', function(req, res) {
        res.render('home');
    });

};