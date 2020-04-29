const recipe = require('../models/recipe');


module.exports = function (app) {
    // GET HANDLERS
    app.get('/', async function (req, res) {
        const recipesFromDb = await recipes(req, res);
        res.render('home', { data : recipesFromDb});

    });

};


async function recipes(req, res) {
    var x = await recipe.getAllRecipes();
    return x;
}