# releasenotes
A small little project that helps you with publishing release notes easily.

This project users several frameworks/libraries/repo's.

- Vue
- Vue Router
- Axios
- Lodash
- Marked

Clone this repo by doing

    git clone https://github.com/wouter3119/releasenotes
    
Then change the following in your `index.php` file:

    base: /releases             // yourdomain.com/releases/ is the default place for release notes
    
    data: '',                   // The data variable inside of Vue will get 'marked'. Add content here to display while the api request is taking place
    name: '',                   // This is the name of your programm/piece of software
    desc: '',                   // Write a small description for your programm/piece of software
    go_back_text: '',           // When viewing an individual release note, a link disappears. Here you can define what it should display
    api_error: '',              // The message that should be displayed when the api call fails
    api_url: '',                // Your api_url
