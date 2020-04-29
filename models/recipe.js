const db = require('../database');


module.exports.getAllRecipes = async function () {
    const snapshot = await db.collection('recipes').get()
    return snapshot.docs.map(doc => doc.data());
};

