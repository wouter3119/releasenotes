# releasenotes
A small little project that helps you with publishing release notes easily.

You can find a working version of this on [postduif.me/releases](https://postduif.me/releases)

---

## Navigation

- [Libraries / Frameworks](https://github.com/woutertoday/releasenotes#libraries--frameworks)
- [Installation](https://github.com/woutertoday/releasenotes#installation)
- [Default API endpoint](https://github.com/woutertoday/releasenotes#default-api-endpoint)
- [Data Structe / Usage](https://github.com/woutertoday/releasenotes#data-structure--usage)
  - [Explained](https://github.com/woutertoday/releasenotes#explained)
  - [Strings](https://github.com/woutertoday/releasenotes#content-strings)
  - [Arrays](https://github.com/woutertoday/releasenotes#content-arrays)
- [Questions / Issues / Feedback / Feature requests](https://github.com/woutertoday/releasenotes#questions--issues--feedback--feature-requests)

---

## Libraries / Frameworks

This project users several frameworks/libraries/repo's.

- Vue (and Vue Router)
- Axios
- Lodash
- Marked

---

## Installation

Clone this repo by doing

    $git clone https://github.com/woutertoday/releasenotes

First, rename the `releasenotes` directory, to `releases`. Then change the following in your `index.html` file:

    base: /releases     // yourdomain.com/releases/ is the default place for release notes


    data: '',           // All data will be marked(). Optional 'loading' message here.
    name: '',           // This is the name of your programm/piece of software
    desc: '',           // Write a small description for your programm/piece of software
    go_back_text: '',   // Define the text that appears when viewing individual release note
    api_error: '',      // The message that should be displayed when the api call fails
    api_url: '',        // Your api_url

Change this in your `.htaccess`

    RewriteRule . /releases/index.php [L]  // Match the path to the 'base' path in index.php

That should be it!
Have fun releasing :)

---

## Default api endpoint

Currently the `api_url` variable is set to `/data/notes.json`.

Feel free to publish your own release notes in through this `json` file.

Read about data structures and usage below!

---

## Data structure / usage

Find an example in `/data/notes.json`

In this file you will find an array, containing objects.

Every object is expected to have `id`, a `date` and a `content`-section.

### Explained

- `id (Int)`: This is the ID, the ID is also referred to in the URLs
- `date (String)`: Enter the date here, in whatever format you prefer. You can also use this as a title.
- `content (Object)`: Content should be an object. Inside of object you can define array or strings.

### Content: Strings

    "content": {
            "awesome":"These are this week's release notes!"
        }

Will render as:

**Awesome**: These are this week's release notes!

*note*: All `indexes` are auto capitalized.

If you use 'introduction' as an `index`, it (the index) will be removed, like so:

    "content": {
            "introduction":"These are this week's release notes!"
        }

Will render as:

These are this week's release notes!

### Content: Arrays

All arrays inside of `content` will render the same.

The `index` will be capitalized and will be used as the 'title' of that specific section.

All array items will be rendered as `<li>`-items. Example:

    "new":[
            "New item!",
            "Another new item"
        ]

Will render as:

**New**:
- New item!
- Another new item

---

## Questions / Issues / Feedback / Feature requests?

Questions are always welcome, just like issues and feature requests!

Also, feedback is greatly appreciated :)

Happy releasing!

---

## License

Copyright (c) 2017, Wouter Dijkstra (woutr.co). (MIT License)

See LICENSE for more info.
