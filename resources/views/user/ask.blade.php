<style>
    .ask-container {
        max-width: 600px;
        margin: 50px auto;
        padding: 25px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        font-family: 'Segoe UI', sans-serif;
    }

    .ask-container h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    .ask-form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .ask-form select {
        padding: 10px 15px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 16px;
    }

    .ask-form button {
        background-color: #007BFF;
        border: none;
        color: white;
        padding: 10px 20px;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .ask-form button:hover {
        background-color: #0056b3;
    }

    .ask-answer {
        margin-top: 20px;
        background: #f8f9fa;
        padding: 15px;
        border-left: 4px solid #007BFF;
        border-radius: 5px;
        font-size: 16px;
        color: #333;
    }
</style>

<div class="ask-container">
    <h2>Ask a Question</h2>
    <form method="POST" action="{{ route('ask.question') }}" class="ask-form">
        @csrf
        <select name="question" required>
            <option value="">-- Select a question --</option>

            <optgroup label="Company Info & General Questions">
                <option value="Who is the founder of AutoRail company?">Who is the founder of AutoRail company?</option>
                <option value="What is the main goal of AutoRail company?">What is the main goal of AutoRail company?</option>
                <option value="How can I contact customer support?">How can I contact customer support?</option>
            </optgroup>

            <optgroup label="Train Booking & Search">
                <option value="How do I book a train ticket?">How do I book a train ticket?</option>
                <option value="What should I do if I don't find any trains?">What should I do if I don't find any trains?</option>
                <option value="How can I check available trains?">How can I check available trains?</option>
            </optgroup>

            <optgroup label="Payment & Slip Download">
                <option value="What payment methods are accepted?">What payment methods are accepted?</option>
                <option value="I paid for my ticket. How can I download the slip?">I paid for my ticket. How can I download the slip?</option>
                <option value="I didn’t get the download slip after payment. What should I do?">I didn’t get the download slip after payment. What should I do?</option>
            </optgroup>

            <optgroup label="Technical Issues">
                <option value="What should I do if the website is not working properly?">What should I do if the website is not working properly?</option>
                <option value="I forgot my password. How do I reset it?">I forgot my password. How do I reset it?</option>
            </optgroup>
        </select>

        <button type="submit">Ask</button>
    </form>

    @if(isset($answer))
        <div class="ask-answer">
            {{ $answer }}
        </div>
    @endif
</div>
