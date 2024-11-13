<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telegram Desktop Clone</title>
    <style>
        * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f5f5f5;
    background-color: #2a2a2a;
}

.container {
    width: 80%;
    max-width: 1200px;
    height: 80vh;
    display: flex;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.sidebar {
    width: 30%;
    color: #fff;
    display: flex;
    flex-direction: column;
    padding: 20px;
}

.sidebar h2 {
    font-size: 24px;
    margin-bottom: 20px;
}

.chat-list {
    flex-grow: 1;
    overflow-y: auto;
}

.chat-item {
    padding: 10px;
    margin-bottom: 10px;
    cursor: pointer;
    border-radius: 5px;
    background-color: #3c3c3c;
    transition: background 0.3s;
}

.chat-item:hover {
    background-color: #505050;
}

.chat-window {
    width: 70%;
    display: flex;
    flex-direction: column;
    background-color: #fff;
}

.chat-header {
    padding: 15px;
    background-color: #0078d4;
    color: #fff;
    text-align: center;
}

.chat-content {
    flex-grow: 1;
    padding: 20px;
    overflow-y: auto;
    background-color: #e5e5e5;
}

.message {
    margin-bottom: 10px;
    padding: 10px 15px;
    border-radius: 10px;
    max-width: 60%;
}

.received {
    background-color: #d1e7ff;
    align-self: flex-start;
}

.sent {
    background-color: #c0ffc0;
    align-self: flex-end;
}

.chat-input {
    display: flex;
    padding: 10px;
    background-color: #fff;
    border-top: 1px solid #ddd;
}

.chat-input input {
    flex-grow: 1;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-right: 10px;
    outline: none;
}

.chat-input button {
    padding: 10px 20px;
    border: none;
    background-color: #0078d4;
    color: #fff;
    cursor: pointer;
    border-radius: 5px;
    transition: background 0.3s;
}

.chat-input button:hover {
    background-color: #005bb5;
}

    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h2>Chats</h2>
            
            <div class="chat-list">
                @foreach($users as $user)
                    <div class="chat-item">{{$user->name}}</div>
                @endforeach
            </div>
        </div>
        <div class="chat-window">
            <div class="chat-header">
                <h3>Chat 1</h3>
            </div>
            <div class="chat-content">
                <div class="message received">Hello!</div>
                <div class="message sent">Hi there!</div>
            </div>
            <div class="chat-input">
                <input type="text" id="messageInput" placeholder="Type a message">
                <button id="sendBtn">Send</button>
            </div>
        </div>
    </div>
    <script>
        document.getElementById("sendBtn").addEventListener("click", sendMessage);
document.getElementById("messageInput").addEventListener("keypress", function(event) {
    if (event.key === "Enter") {
        event.preventDefault(); // Prevents the default behavior (e.g., creating a new line)
        sendMessage();
    }
});

function sendMessage() {
    const messageInput = document.getElementById("messageInput");
    const messageText = messageInput.value.trim();

    if (messageText) {
        // Create a new message element
        const messageElement = document.createElement("div");
        messageElement.classList.add("message", "sent");
        messageElement.textContent = messageText;

        // Add the message to the chat content area
        document.querySelector(".chat-content").appendChild(messageElement);

        // Clear the input field and focus back on it
        messageInput.value = "";
        messageInput.focus();

        // Scroll to the bottom of the chat content
        document.querySelector(".chat-content").scrollTop = document.querySelector(".chat-content").scrollHeight;
    }
}

    </script>
</body>
</html>
