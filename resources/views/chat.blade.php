<!DOCTYPE html>
<html>
<head>
    <title>Twilio Flex Web Chat</title>
    <link href="https://media.twiliocdn.com/taskrouter/quickstart/agent.css" rel="stylesheet">
</head>
<body>
    <div id="root"></div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    
    <script src="https://assets.flex.twilio.com/releases/flex-webchat-ui/2.9.1/twilio-flex-webchat.min.js" integrity="sha512-yBmOHVWuWT6HOjfgPYkFe70bboby/BTj9TGHXTlEatWnYkW5fFezXqW9ZgNtuRUqHWrzNXVsqu6cKm3Y04kHMA==" crossorigin></script>
    <script>

const appConfig = {
                accountSid:"AC7b53454efe626306ac0ddd4a96604506",
                flexFlowSid:"FW8358cc6a4c5621a69dcd3b44c611b9de"
            };
            
            
            Twilio.FlexWebChat.createWebChat(appConfig).then(webchat => {
    const { manager } = webchat;
    
//Posting question from preengagement form as users first chat message
    Twilio.FlexWebChat.Actions.on("afterStartEngagement", (payload) => {
        const { question } = payload.formData;
        if (!question)
            return;

        const { channelSid } = manager.store.getState().flex.session;
        manager
            .chatClient.getChannelBySid(channelSid)
            .then(channel => channel.sendMessage(question));
    });
// Changing the Welcome message
    manager.strings.WelcomeMessage = "welcome";

// Render WebChat
    webchat.init();
  });
  
    </script>
    
</body>
</html>