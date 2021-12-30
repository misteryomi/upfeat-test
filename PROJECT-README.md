BACKEND SETUP

1. Access the backend docker bash using the command, `docker compose exec backend bash`
2. Run `php artisan migrate --seed` and run `php artisan storage:link` to enable symbolic file linking

FRONTEND SETUP 
Under the /frontend directory, run `npm install`, then run `npm run dev` while in development mode


What I did:
1. I set defined the table structure using the Artisan cli commands then seeded some fake data for initial bookstore data.
2. I defined a BooksController resource to manage all CRUD operations.
3. I defined Resources/Collections to make API data more readable/structured.
4. I defined a BookRequest validator to manage Create/Update validation, rather than writing same validation twice. Also fulfils the Single responsibility principle in SOLID.
5. I installed tailwind css using the guide found at https://tailwindcss.com/docs/guides/vite to ease the UI design.
6. I installed @herosicons/vue and @headlessui/vue as additional Tailwind UI componeents and vue-toast-notification to manage toast messages.
7. I defined necessary reusable components in the `/Components` directory and I set the essential route in the `router/index.ts` file
8. I pushed this code to the repository for easy access.


THINGS I COULD DO DIFFERENTLY
- Proper frontend validation before posting data to the backend
- More modularized frontend pattern
- Handling image upload separately while posting book data separately via JSON.
- Pagination - I did not finish up with pagination on the front-end due to time constraints, however, that is very easy to implement.
- I could use Vuex to manage states so as to avoid continuous pulling of data from the db.
- Caching could be incorporated to save the database from unnecessary queries
- Images could be uploaded on s3 rather than locally
- Search feature for books
- Possibly a switch from REST to GraphQL to improve performance
- e.t.c.


ISSUES I ENCOUNTERED
1. While I had gotten the basic code ready within 2-3 hours of coding, the UI took bulk of my time (amounting to about 6 additional hours), as well as certain bugs I encountered with using PATCH method in updating book records on the backend. I had initually attempted allowing uploads of cover_image while updating, but I figured it had been a challenge other developers hadn't been able to solve. An easier approach would be to have a separate endpoint to manage image uploads instead, so image uploads woudn't take unnecessary time while attempting to also update book details.

2. I had issues with accessing uploaded images on the frontend. There seems to be some docker symlink issues because i had ran the `php artisan storage:link`, and had done necessary permissions, but none worked. I am sure if given more time, I'd have it sorted.


Finally, It's been a priledge being assigned this test to work on. Looking forward to an exciting journey with the team, HOPEFULLY. :)