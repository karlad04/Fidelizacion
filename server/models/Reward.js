const mongoose = require('mongoose');

   const rewardSchema = new mongoose.Schema({
     name: { type: String, required: true },
     description: { type: String },
     pointsRequired: { type: Number, required: true },
   });

   module.exports = mongoose.model('Reward', rewardSchema);