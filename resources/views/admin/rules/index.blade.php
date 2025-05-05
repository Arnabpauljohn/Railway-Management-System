<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Rules</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f7f9;
            padding: 20px;
        }

        h2 {
            color: #2c3e50;
            border-bottom: 2px solid #3498db;
            padding-bottom: 5px;
            margin-top: 30px;
        }

        .form-container {
            background: #fff;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 30px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        button {
            background-color: #3498db;
            border: none;
            padding: 10px 16px;
            color: #fff;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2980b9;
        }

        .action-buttons {
            display: flex;
            justify-content: space-between;
        }

        .action-buttons form {
            display: inline-block;
        }

        .action-buttons button {
            margin-left: 10px;
        }

        .delete-btn {
            background-color: #e74c3c;
        }

        .delete-btn:hover {
            background-color: #c0392b;
        }

        .update-btn {
            background-color: #2980b9;
        }

        .update-btn:hover {
            background-color: #21618c;
        }

        .rules-list {
            margin-top: 20px;
        }

        .rules-list form {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <h2>Add New Rule</h2>
    <div class="form-container">
        <form method="POST" action="/admin/rules">
            @csrf
            <input type="text" name="question" placeholder="Enter question keyword" required />
            <textarea name="answer" placeholder="Enter answer" required></textarea>
            <button type="submit">Add Rule</button>
        </form>
    </div>

    <h2>All Rules</h2>
    <div class="rules-list">
        @foreach($rules as $rule)
            <div class="form-container">
                <!-- Update Form -->
                <form method="POST" action="/admin/rules/update/{{ $rule->id }}">
                    @csrf
                    @method('PUT') <!-- This simulates the PUT method -->
                    <input name="question" value="{{ $rule->question }}" required />
                    <input name="answer" value="{{ $rule->answer }}" required />
                    <button type="submit">Update</button>
                </form>


                        <!-- Delete Form -->
                        <form method="POST" action="/admin/rules/delete/{{ $rule->id }}" style="display:inline;">
                            @csrf
                            @method('DELETE')  <!-- Add this line to specify the DELETE method -->
                            <button type="submit">Delete</button>
                        </form>

                    </div>
                </form>
            </div>
        @endforeach
    </div>

</body>
</html>
