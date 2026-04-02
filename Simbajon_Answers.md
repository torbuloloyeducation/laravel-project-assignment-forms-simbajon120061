Task 1: Understand the Flow
Trace how the form works:
1. User enters email
2. Form submits via POST
3. Email is stored in session
4. Page reloads and displays saved emails
Write a short explanation (3–5 sentences) of this flow.
    When a user submits the form, the data is sent via a POST request to the server. The server processes the data (storing it in the session) and then sends a redirect response back to the browser. This tells the browser to make a new GET request to the original page, preventing the "Confirm Form Resubmission" error if the user refreshes


-- Reflection Questions

1. What is the difference between GET and POST?
    GET is used to request data from a specified resource (like loading a page), and parameters are visible in the URL, while POST is used to send data to a server to create/update a resource, and the data is sent in the HTTP message body, making it more secure for sensitive info and capable of sending larger amounts of data.

2. Why do we use @csrf in forms?
    The @csrf directive generates a hidden token that protects your application from Cross-Site Request Forgery attacks. It ensures that the person submitting the form is actually the authenticated user on your site and not a malicious third-party script.

3. What is session used for in this activity?
    In this activity, the session is used as a temporary data store. Since HTTP is "stateless" (it doesn't remember you between page loads), the session allows us to persist the list of emails across multiple requests without needing a permanent database.

4. What happens if session is cleared?
    If the session is cleared (either by closing the browser, expiration, or calling session()->forget()), all the stored email data will be lost, and the list will appear empty the next time the page is loaded.