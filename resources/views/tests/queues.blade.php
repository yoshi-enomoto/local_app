<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Sample Queues</title>
</head>
<body>
<p>
  Queues test!!
</p>
@if(!empty($start))
  {{ time() - $start }}
@endempty
{{-- {{ dd($start, time()) }} --}}
</body>
</html>
