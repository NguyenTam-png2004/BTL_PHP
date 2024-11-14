<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 0;
        }
        .container_grammar {
            max-width: 1000px;
            height: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top:100px;
        }
        .content {
            margin-top: 20px;
        }
        .content h1 {
            font-size: 24px;
            color: #333
        }
        .content h2 {
            font-size: 18px;
            color: #333;
        }
        .content p {
            font-size: 20px;
            color: #555;
            line-height: 1.6;
        }
        .content h3 {
            color: #333;
            text-align:center;
        }
        .content p span {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container_grammar">
        <div class="content">
            <h1><?php echo $grammar->name?></h1>
            <h3>Here's a tip!</h3>
            <p><?php echo $grammar->grammar?></p>
        </div>
    </div>
</body>
</html>
