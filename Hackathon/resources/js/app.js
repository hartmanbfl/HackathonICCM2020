require('./bootstrap');

// I don't think this is being called
Echo.channel('GospelConversations')
  .listen('App\\Events\\ThreadAdded', (data) => {
    console.log(`In app.js: data-> ${data}`);
  });