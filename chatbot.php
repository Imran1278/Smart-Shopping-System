    <?php
    // Start session to store chat history
    session_start();

    // Initialize chat history if not already set
    if (!isset($_SESSION['chat_history'])) {
        $_SESSION['chat_history'] = [];
    }

    // Predefined chatbot responses
    $responses = [
        "hello" => "Hi there! How can I assist you today?",
        "hi" => "Hello! How can I help you?",
        "products" => "We offer electronics, clothing, accessories, and much more.",
        "delivery" => "We provide free shipping for orders above $50. Delivery takes 3-5 business days.",
        "payment" => "We accept Visa, MasterCard, PayPal, and cash on delivery.",
        "support" => "You can contact us at support@ecommerce.com or call +123456789.",
        "return policy" => "We offer a 30-day return policy. Ensure the product is in original condition.",
        "bye" => "Goodbye! Have a great shopping experience!",
        "thanks" => "Oh its ok, Welcome",
    ];

    // Default response for unrecognized input
    $defaultResponse = "I'm sorry, I didn't understand that. Can you rephrase?";

    // Process user message if submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['user_message'])) {
        $userMessage = strtolower(trim($_POST['user_message'])); // Sanitize user input

        // Match user input to predefined responses
        $botResponse = $defaultResponse;
        foreach ($responses as $key => $response) {
            if (strpos($userMessage, $key) !== false) {
                $botResponse = $response;
                break;
            }
        }

        // Save user message and bot response to chat history
        $_SESSION['chat_history'][] = ["user" => $userMessage, "bot" => $botResponse];
    }

    // Clear chat history if requested
    if (isset($_POST['clear_chat'])) {
        $_SESSION['chat_history'] = [];
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chatbot</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
            .chat-container {
                width: 400px;
                background: #ffffff;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                display: flex;
                flex-direction: column;
            }
            .chat-header {
                background-color: #007bff;
                color: white;
                padding: 15px;
                font-size: 18px;
                text-align: center;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
            }
            .chat-body {
                padding: 15px;
                height: 300px;
                overflow-y: auto;
                border-bottom: 1px solid #ddd;
            }
            .chat-body .message {
                margin-bottom: 10px;
            }
            .chat-body .user {
                text-align: right;
            }
            .chat-body .user .bubble {
                background-color: #007bff;
                color: white;
                padding: 10px;
                border-radius: 15px;
                display: inline-block;
                max-width: 70%;
            }
            .chat-body .bot {
                text-align: left;
            }
            .chat-body .bot .bubble {
                background-color: #f1f1f1;
                color: #333;
                padding: 10px;
                border-radius: 15px;
                display: inline-block;
                max-width: 70%;
            }
            .chat-footer {
                display: flex;
                gap: 10px;
                padding: 10px;
                background: #f9f9f9;
                border-bottom-left-radius: 10px;
                border-bottom-right-radius: 10px;
            }
            .chat-footer input {
                flex: 1;
                padding: 10px;
                border: 1px solid #ddd;
                border-radius: 5px;
            }
            .chat-footer button {
                padding: 10px 15px;
                border: none;
                background-color: #007bff;
                color: white;
                border-radius: 5px;
                cursor: pointer;
            }
            .chat-footer button:hover {
                background-color: #0056b3;
            }
            .clear-btn {
                background-color: #dc3545;
            }
            .clear-btn:hover {
                background-color: #b02a37;
            }
            
        </style>
    </head>
    <body>


    <div class="chat-container">
        <div class="chat-header">
            AI E-Commerce Chatbot
        </div>
        <div class="chat-body">
            <?php if (!empty($_SESSION['chat_history'])): ?>
                <?php foreach ($_SESSION['chat_history'] as $chat): ?>
                    <div class="message user">
                        <div class="bubble"><?= htmlspecialchars($chat['user']); ?></div>
                    </div>
                    <div class="message bot">
                        <div class="bubble"><?= htmlspecialchars($chat['bot']); ?></div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="message bot">
                    <div class="bubble">Hello! How can I help you today?</div>
                </div>
            <?php endif; ?>
        </div>
        <form method="POST" class="chat-footer">
            <input type="text" name="user_message" placeholder="Type your message here..." required>
            <button type="submit">Send</button>
            <button type="submit" name="clear_chat" class="clear-btn">Clear Chat</button>
        </form>
    </div>

    </body>
    </html>
