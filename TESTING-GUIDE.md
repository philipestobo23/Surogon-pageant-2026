# Surogon Pageant 2026 — System Testing Guide

## Overview

This guide explains how to fully test the scoring system from login to final results.  
The system has **2 user roles**: `admin` and `Judge1–Judge5`.

---

## 1. Prerequisites

Before testing, make sure the database is seeded with contestants and that accounts exist.

```bash
# Reset and seed the database
php artisan migrate:fresh --seed

# Start the development server
php artisan serve

# In a separate terminal, build front-end assets
npm run dev
```

The app will be accessible at: **http://127.0.0.1:8000**

---

## 2. User Accounts

> **Note:** Passwords are set in the seeder or manually via Tinker. Default credentials used during development:

| Role    | Username | Password   |
|---------|----------|------------|
| Admin   | `admin`  | `admin123`  |
| Judge 1 | `Judge1` | `judge123`  |
| Judge 2 | `Judge2` | `judge123`  |
| Judge 3 | `Judge3` | `judge123`  |
| Judge 4 | `Judge4` | `judge123`  |
| Judge 5 | `Judge5` | `judge123`  |

To verify or reset passwords via Tinker:

```bash
php artisan tinker
# Then run:
App\Models\User::where('name','Judge1')->first()->update(['password' => bcrypt('judge123')]);
```

---

## 3. Contestant Roster (16 Contestants)

| No. | Name                                | Representing               |
|-----|-------------------------------------|----------------------------|
| 1   | Kendi Gwyneth Lynn Rosebrugh        | The Eventor                |
| 2   | Shieny Griethzer Lozada             | Municipality of Alegria    |
| 3   | Chasty Escalada                     | Municipality of Placer     |
| 4   | Janna May Ong                       | Brgy. San Juan, Surigao City |
| 5   | Princess Ricci Reambonanza          | Municipality of Bacuag     |
| 6   | Sophia Beatrice Paredes             | Family Planning ORG        |
| 7   | Princess Glory Jane Escobal Handayan | Municipality of Sta. Monica |
| 8   | Aisha Gelian Go                     | Brgy. Luna, Surigao City   |
| 9   | Alyza Vic De Gracia                 | Brgy. Taft, Surigao City   |
| 10  | Christy Lee Alipao                  | Jamoyaon Del Carmen, Siargao |
| 11  | Phoebe Shane Sorongon               | San Francisco, Anao-aon   |
| 12  | Princess Mae Espinosa               | Municipality of Tagana-an  |
| 13  | Yesha Mae Ebron                     | Municipality of Placer     |
| 14  | Tricia Mae Comandante               | Municipality of Malimono   |
| 15  | Kim Kristene Larong                 | Municipality of Gigaquit   |
| 16  | Glezany Manongsong                  | Brgy. Luna, Surigao City   |

---

## 4. Scoring Workflow (Step-by-Step)

### Step 1 — Judge Logs In

1. Open **http://127.0.0.1:8000** in a browser (or tablet).
2. Log in with a judge account (e.g., `Judge1` / `judge123`).
3. The **Judge Dashboard** appears showing 3 scoring sections.

---

### Step 2 — Round 1: Top 8 Selection (16 Contestants)

Both events must be scored by **all 5 judges** before the admin can proceed.

#### A. Swimwear Category
- URL: `/swimsuit/form`
- From the dashboard, click **"Swimwear"**.
- A grid of 16 contestant cards appears.
- Enter a score from **1.0 to 10.0** (step 0.1) for each contestant.
- Click **"Submit Scores"** at the bottom.
- A confirmation prompt will appear — confirm to save.

#### B. Evening Gown Category
- URL: `/gown/form`
- From the dashboard, click **"Evening Gown"**.
- Same process as Swimwear — score all 16 contestants and submit.

---

### Step 3 — Admin Advances to Round 2 (Top 8)

1. Log in as `admin` at `/admin`.
2. Go to the **"Top 8 Selection"** tab.
3. Review the combined rankings from Swimwear + Gown scores.
4. Click **"Proceed to Round 2"** — this locks the Top 8 contestants into the next round.

> Only the Top 8 contestants will appear in Round 2 scoring forms.

---

### Step 4 — Round 2: Top 3 Selection (Top 8 Contestants)

#### Snap Talk — Q&A Response
- URL: `/question/form`
- From the dashboard, click **"Snap Talk"**.
- Score 8 contestants (1.0–10.0) and submit.

All 5 judges complete this event.

---

### Step 5 — Admin Advances to Final Round (Top 3)

1. In the Admin panel, go to the **"Top 3 Selection"** tab.
2. Review Snap Talk rankings.
3. Click **"Proceed to Final"** — locks the Top 3 finalists.

---

### Step 6 — Final Round: Top 3 Finalists

#### Final Q&A
- URL: `/final/form`
- From the dashboard, click **"Final Q&A"**.
- Score the 3 finalists and submit.

All 5 judges complete this event.

---

### Step 7 — Admin Views Results & Generates PDF

1. Log in as `admin`.
2. Go to the **"Final Placement"** tab to see the final rankings.
3. Click **"Generate PDF Report"** to download the full scoring report.

---

## 5. Admin Activity Log — Monitoring Judge Submissions

1. Log in as `admin`.
2. Click the **"Activity Log"** tab in the Admin panel.
3. Each judge card shows 4 event rows:

   | Event      | Status   |
   |------------|----------|
   | Swimwear   | ✅ Submitted / ⏳ Pending |
   | Gown       | ✅ Submitted / ⏳ Pending |
   | Snap Talk  | ✅ Submitted / ⏳ Pending |
   | Final Q&A  | ✅ Submitted / ⏳ Pending |

4. Click any **submitted** event row (green) to see that judge's **individual scores per contestant** in a pop-up.
5. Use the **"Refresh"** button to check for real-time updates.

---

## 6. Quick Tablet Test (Single Judge, All Rounds)

Use this sequence to quickly validate scoring on a tablet device:

```
1. Open http://<server-ip>:8000 on the tablet browser
2. Log in as Judge1 / judge123
3. Go to Swimwear → enter scores (e.g. 7.5 for all) → Submit
4. Go to Evening Gown → enter scores (e.g. 8.0 for all) → Submit
5. [Admin] Proceed to Round 2
6. Go to Snap Talk → enter scores → Submit
7. [Admin] Proceed to Final
8. Go to Final Q&A → enter scores → Submit
9. [Admin] Activity Log → click Judge1's submitted rows to verify scores
10. [Admin] Generate PDF → check all scores appear correctly
```

> Replace `<server-ip>` with your machine's local IP (e.g. `192.168.1.x`) if testing on a tablet on the same Wi-Fi network.

---

## 7. Score Range Reference

| Event        | Table        | Score Range | Step |
|--------------|-------------|-------------|------|
| Swimwear     | `coronation` | 1.0 – 10.0  | 0.1  |
| Evening Gown | `coronation` | 1.0 – 10.0  | 0.1  |
| Snap Talk    | `top10s`     | 1.0 – 10.0  | 0.1  |
| Final Q&A    | `finals`     | 1.0 – 10.0  | 0.1  |

---

## 8. Troubleshooting

| Problem | Solution |
|---------|----------|
| Judge can't see contestants in Round 2 | Admin has not yet clicked "Proceed to Round 2" |
| Scores don't appear in Activity Log | Refresh the tab or click the Refresh button |
| Score modal shows "No scores recorded yet" | The judge has not submitted scores for that event yet |
| PDF is blank or missing data | Ensure all rounds are completed and admin has generated rankings |
| Login fails | Check username/password via Tinker (see Section 2) |
| App shows 500 error | Run `php artisan config:clear` and `php artisan cache:clear` |
