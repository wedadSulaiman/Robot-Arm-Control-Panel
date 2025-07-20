# Robot-Arm-Control-Panel
## Project Description
A simple web interface using PHP and MySQL to control a 6-motor robotic arm. Users can set motor angles via sliders and then save, run, load, update, or delete poses.

## Requirements
- XAMPP (or any local server with PHP and MySQL)
- Modern web browser (e.g., Chrome, Firefox)

## Main Files
- index.php: Main control interface
- connection.php: Database connection file
- save_pose.php: Save a new pose
- delete_pose.php: Delete a pose
- update_status.php: Update a specific pose
- run_pose.php: Run and store the current pose
- get_run_pose.php: Display the last run pose
  
## Interface preview:
<img width="1284" height="865" alt="image" src="https://github.com/user-attachments/assets/9eb465e6-3811-4f72-a1d0-037f9f6867ff" />

## Button Descriptions:
- Save Pose: Saves the current motor values to the database.
  * when we press savepose button * 
  <img width="934" height="772" alt="image" src="https://github.com/user-attachments/assets/52a64c81-827a-496e-944d-e31b201991d3" />


- Run: Runs the current pose and stores it as "last run".
  * when we press run button it should store in database and we will display that in run_pose.phh webpage*
<img width="1363" height="536" alt="image" src="https://github.com/user-attachments/assets/298a2cc6-da0e-42e2-ba63-f63559b7906a" />

- Reset: Resets all sliders to 90.
<img width="1067" height="808" alt="Screenshot 2025-07-20 185527" src="https://github.com/user-attachments/assets/7ab51904-c9b8-4dc4-bddf-3066c8cb92f2" />
<img width="960" height="835" alt="Screenshot 2025-07-20 185534" src="https://github.com/user-attachments/assets/188c43b1-a1f5-4ff2-8280-e38a4a4b7143" />


- Load: Loads saved pose values into sliders.
<img width="955" height="896" alt="image" src="https://github.com/user-attachments/assets/3a31e612-0347-4a7c-baeb-446e92567fac" />

- Remove: Deletes the pose from the table.
<img width="1130" height="400" alt="image" src="https://github.com/user-attachments/assets/198256a5-953d-4372-ab3c-4aaeef56d198" />

- Update Pose: Updates an existing pose after editing.
  <img width="972" height="858" alt="image" src="https://github.com/user-attachments/assets/df40e9db-0b22-48d8-8b94-7e2d8fcd031e" />
