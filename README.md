# form-task

Task: Build a Form and its validation. We don’t need to save the data. On submission the form will be validated and if there are any errors, there will be an alert that tells the user what the issue in the form is and how they can resolve that issue.

The form will contain the following the fields:
First Name [required, text, max-length:20, min-length:2]
Last Name [required, text, max-length:20, min-length:2]
Gender [radio, will have two options: male and female, will be unselected at page load, user will be required to select one]
Email [required, text, valid email, max-length:20, min-length:2]
Phone [required, numbers, length:7]
Address [required, text, max-length:50, min-length:10]
Password [required, password, max-length:20, min-length:6]
Confirm Password [required, password, max-length:20, min-length:6, matches with ‘Password’]
Checkbox for ‘I agree to the terms” [this will be unchecked by default, user will be required to mark it as checked]

You will not use any type of HTML/JS validation.
Any kind of styling is optional.
PHP will check for data type in the fields, valid any length restrictions, will match password fields and sanitize the input data.
After submission, users will be told what the error is and how they can fix it in plain language.
All fields will be validated when the form is submitted and if all validations are clear, they will see an appropriate notice.
Your PHP code should not use any libraries or copy/pasted code.
Your code should be properly indented and commented.
