const recipe = require('../models/recipe');


module.exports = function (app) {
    // GET HANDLERS
    app.get('/', async function (req, res) {
        const recipesFromDb = await getAllRecipes(req, res);
        res.render('home', { data : recipesFromDb});
    });

    app.get('/recipe', async function (req, res) {
        const recipesFromDb = await getAllRecipes(req, res);
        res.render('home', { data : recipesFromDb});
    });
};



async function getAllRecipes(req, res) {
    var x = await recipe.getAllRecipes();
    return x;
}