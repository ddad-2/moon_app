// 全アブノーマリティ一覧取得API
app.get('/api/abnormalities', (req, res) => {
  db.query('SELECT * FROM abnormalities ORDER BY risk_level', (err, result) => {
    if (err) {
      console.error('クエリエラー:', err);
      res.status(500).json({ error: 'サーバーエラー' });
    } else {
      res.json(result);
    }
  });
});
