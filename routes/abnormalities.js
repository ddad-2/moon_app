const express = require('express');
const router = express.Router();
const fs = require('fs');
const path = require('path');

router.get('/zayin', (req, res) => {
  const filePath = path.join(__dirname, '../data/zayin.json');
  fs.readFile(filePath, 'utf8', (err, jsonData) => {
    if (err) {
      console.error('データの読み込みに失敗しました:', err);
      res.status(500).json({ error: 'データ読み込みエラー' });
    } else {
      const data = JSON.parse(jsonData);
      res.json(data);
    }
  });
});

module.exports = router;
