# Project 3
+ By: Daniel Bodner
+ Production URL: <http://e15p3.dannybodner.com>

## Feature summary
My Project 3 was created to help users find new workouts to try. A user can either input form data or have it all completely randomized. The user can continue to generate workouts until satisfied. If the user likes the workout, he/she can save it and view it later, until the user chooses to delete it.

+ Users can register/log in
+ Users can create workouts based on specific criteria (body parts, abs included, cardio)
+ Users can continually generate new workouts based on the initial criteria until satisfied with the output
+ Once the user likes a workout, the user can save it
+ Users can view all of their saved workouts
+ Users can delete workouts that they no longer want to use
+ Users can click a button to generate a random workout without inputting any data, and save it if wanted
+ The home page is used to create new workouts, and display a table of the current user's saved workouts

## Database summary
+ My application has 5 tables in total (```users```, ```exercises```, ```abs```, ```cardio_exercises```, and ```workouts```)
+ There's a many-to-many relationship between ```workouts``` and ```exercises```
+ There's a many-to-many relationship between ```workouts``` and ```abs```
+ There's a one-to-many relationship between ```workouts``` and ```cardio```
+ There's a one-to-many relationship between ```workouts``` and ```users```

## Outside resources
1. [w3schools.com/tags/tag_select.asp](https://www.w3schools.com/tags/tag_select.asp)
    + I used this website to refresh my memory on HTML select tags.
2. [getcssscan.com/css-box-shadow-examples](https://getcssscan.com/css-box-shadow-examples)
    + I used this website to view examples of css shadows.
3. [freecodecamp.org](https://www.freecodecamp.org/news/php-implode-convert-array-to-string-with-join/#:~:text=In%20PHP%2C%20the%20implode(),the%20values%20to%20a%20string.)
    + I used this website to see examples of how to use implode and explode with an array.
4. [php.net/manual/en/function.array-push.php](https://www.php.net/manual/en/function.array-push.php)
    + I used this website to view examples of how to append data into an array.
5. [freecodecamp.org](https://www.freecodecamp.org/news/dot-symbol-bullet-point-in-html-unicode/#:~:text=The%20Unicode%20and%20HTML%20Entities%20for%20Bullet%20Points,it%20becomes%20%E2%80%A2%20.)
    + I used this website to get the unicode for a bullet point in html.
6. [https://code-boxx.com/show-hide-elements-css-javascript/](https://code-boxx.com/show-hide-elements-css-javascript/)
    + I used this website to refresh my memory on showing and hiding elements with JavaScript.
7. [freecodecamp.org/news/html-tables-table-tutorial-with-css-example-code/](https://www.freecodecamp.org/news/html-tables-table-tutorial-with-css-example-code/)
    + I used this website to learn more about html tables.
8. [saunabouya-com.translate.goog](https://saunabouya-com.translate.goog/2021/04/13/base-table-or-view-not-found/?_x_tr_sl=ja&_x_tr_tl=en&_x_tr_hl=en&_x_tr_pto=sc)
    + This website helped me debug when one of my tables wasn't seeding properly.
9. [codepen.io/yuhomyan/pen/LYNVVNO](https://codepen.io/yuhomyan/pen/LYNVVNO)
    + I referenced this website for button styling.
10. [quora.com/How-do-I-make-an-entire-table-row-clickable-in-HTML](https://www.quora.com/How-do-I-make-an-entire-table-row-clickable-in-HTML)
    + I used this website to learn how to make my entire table row clickable.
11. [laracasts.com/discuss/channels/laravel/required-without-all-validation](https://laracasts.com/discuss/channels/laravel/required-without-all-validation)
    + I used this website to learn how to use proper validation with checkboxes when minimum one needs to be checked.
12. [https://getbootstrap.com/docs/4.0/layout/grid/](https://getbootstrap.com/docs/4.0/layout/grid/)
    + I used this website as reference for layout with bootstrap.
13. [https://www.toptal.com/designers/htmlarrows/](https://www.toptal.com/designers/htmlarrows/)
    + I used this website to get an arrow symbol.

## Notes for instructor
N/A

## Tests
```
root@hes:/var/www/e15/p3/tests/codeception# codecept run acceptance --steps
Codeception PHP Testing Framework v4.2.2 https://helpukrainewin.org
Powered by PHPUnit 8.5.28 #StandWithUkraine

Acceptance Tests (6) --------------------------------------------------------------------------------------------------------------------
IndexPageCest: Create new workout
Signature: IndexPageCest:createNewWorkout
Test: tests/acceptance/IndexPageCest.php:createNewWorkout
Scenario --
 I am on page "/test/refreshDatabase"
 I am on page "/test/loginAs/1"
 I am on page "/"
 I fill field "[test=mainFormName]","testing workout creation"
 I check option "[test=mainFormChest]"
 I check option "[test=mainFormTriceps]"
 I click "[test=generateButton]"
 I see "Main exercises:"
 I click "[test=regenerateWorkoutButton]"
 I see "testing workout creation"
 I click "[test=saveWorkoutButton]"
 I see "testing workout creation"
 I see "Chest,Triceps"
 PASSED 

IndexPageCest: Create random workout
Signature: IndexPageCest:createRandomWorkout
Test: tests/acceptance/IndexPageCest.php:createRandomWorkout
Scenario --
 I am on page "/test/refreshDatabase"
 I am on page "/test/loginAs/1"
 I am on page "/"
 I see "Logout"
 I click "[test=generateRandomWorkoutButton]"
 I see "Random Workout"
 I click "[test=saveWorkoutButton]"
 I see "1"
 PASSED 

IndexPageCest: No name in form
Signature: IndexPageCest:noNameInForm
Test: tests/acceptance/IndexPageCest.php:noNameInForm
Scenario --
 I am on page "/test/refreshDatabase"
 I am on page "/test/loginAs/1"
 I am on page "/"
 I check option "[test=mainFormChest]"
 I click "[test=generateButton]"
 I see "The name field is required."
 PASSED 

IndexPageCest: No body part in form
Signature: IndexPageCest:noBodyPartInForm
Test: tests/acceptance/IndexPageCest.php:noBodyPartInForm
Scenario --
 I am on page "/test/refreshDatabase"
 I am on page "/test/loginAs/1"
 I am on page "/"
 I fill field "[test=mainFormName]","this will fail"
 I click "[test=generateButton]"
 I see "Atleast one body part is required."
 PASSED 

LoginPageCest: User can log in
Signature: LoginPageCest:userCanLogIn
Test: tests/acceptance/LoginPageCest.php:userCanLogIn
Scenario --
 I am on page "/login"
 I see "Login"
 I see element "#email"
 I fill field "[name=email]","jill@harvard.edu"
 I fill field "[name=password]","asdfasdf"
 I click "button"
 I see "Welcome, Jill Harvard"
 I see "Logout","nav"
 I click "[test=logoutButton]"
 I see "Login"
 PASSED 

RegisterPageCest: User can register
Signature: RegisterPageCest:userCanRegister
Test: tests/acceptance/RegisterPageCest.php:userCanRegister
Scenario --
 I am on page "/test/refreshDatabase"
 I am on page "/register"
 I see "Register"
 I fill field "[name=name]","Test User"
 I fill field "[name=email]","test@harvard.edu"
 I fill field "[name=password]","asdfasdf"
 I fill field "[name=password_confirmation]","asdfasdf"
 I click "button"
 I see "Welcome, Test User!"
 I see "Logout","nav"
 PASSED 

-----------------------------------------------------------------------------------------------------------------------------------------


Time: 24.87 seconds, Memory: 18.66 MB

OK (6 tests, 17 assertions)
root@hes:/var/www/e15/p3/tests/codeception# 
```











