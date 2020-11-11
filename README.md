# QuoteEngine
Quoting API calculating total premium based on rating factors provided by JSON Payload

JSON Payload example 

<h2>POST JSON Payload example</h2>

    {
        "age": 20,
        "postcode": "PE3 8AF",
        "regNo": "PJ63 LXR"
    }

Only POST method is accepted.
Send request to '/' and get an insurance premium response in json format.

JSON response example

    {
        "quote": 627
    }