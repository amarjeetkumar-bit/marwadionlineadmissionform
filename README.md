# Marwadi Application Form — Deploy to Vercel (FIXED structure)

The previous build failed because Vercel only detects PHP functions inside
an `api/` folder. This version fixes that.

## Structure (important)
    api/
      index.php    <- the form
      submit.php    <- the handler (reads keys from env vars)
    images/
      fav.png
    vercel.json
    .vercelignore

`vercel.json` routes:
  /            -> api/index.php   (the form loads at your root URL)
  /submit.php  -> api/submit.php  (form posts here)
  everything else is served from the filesystem (e.g. /images/fav.png)

## Deploy steps
1. Rotate your LeadSquared keys first (the old ones were exposed in a shared zip).
2. Upload ALL of these files/folders to your GitHub repo, keeping the folder
   structure exactly as above. Make sure `api/` is at the repo root.
3. In Vercel: Deployments -> Redeploy (or push the commit). Framework = "Other".
4. Project -> Settings -> Environment Variables, add:
       LEADSQUARED_ACCESS_KEY = <your new access key>
       LEADSQUARED_SECRET_KEY = <your new secret key>
5. Redeploy once more so the variables are picked up.
6. Open your .vercel.app URL and test a submission.

## If it still fails
- Confirm the repo has an `api/` folder at its ROOT with the two .php files in it.
- Confirm vercel.json is at the repo root (not inside api/).
