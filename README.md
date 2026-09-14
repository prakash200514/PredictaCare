# 🩺 PredictaCare - Disease Prediction System

[![PHP Version](https://img.shields.io/badge/PHP-7.4+-blue.svg)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-Database-orange.svg)](https://www.mysql.com/)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

**PredictaCare** is a robust, web-based diagnostic assistant designed to help users identify potential health issues based on their symptoms. By selecting specific body parts and corresponding symptoms, the system analyzes the data to provide an informed prediction of possible diseases.

---

## ✨ Key Features

- 👤 **User Authentication**: Secure signup and login for personalized health tracking.
- 🧬 **Body-Part Specific Analysis**: Interactive selection from various body parts (Head, Chest, Abdomen, Pelvis, etc.).
- 🔍 **Symptom Mapping**: Detailed symptom checklists for precise diagnostic logic.
- 📊 **Prediction Engine**: Real-time analysis of symptoms to determine the most likely disease.
- 🕒 **History Tracking**: Log of previous results for users to monitor their health over time.
- 🛠️ **Admin Dashboard**: Comprehensive control panel to manage diseases, symptoms, users, and feedback.
- 📝 **Feedback System**: Integrated communication channel for users to provide suggestions or report issues.

---

## 🚀 Tech Stack

- **Frontend**: HTML5, CSS3, JavaScript, jQuery
- **Backend**: PHP (Core PHP & PDO)
- **Database**: MySQL
- **Design Elements**: Custom CSS layouts and interactive UI components.

---

## 🛠️ Setup & Installation

Follow these steps to get the project running locally:

### 1. Prerequisites
Ensure you have a local server environment installed (e.g., **XAMPP**, **WAMP**, or **MAMP**).

### 2. Clone the Repository
```bash
git clone https://github.com/prakash200514/PredictaCare.git
```

### 3. Database Configuration
1. Start **Apache** and **MySQL** from your XAMPP Control Panel.
2. Open **phpMyAdmin** (`http://localhost/phpmyadmin`).
3. Create a new database named `disease`.
4. Import the `disease.sql` file located in the `database/` folder of this project.

### 4. Connection Setup
If your MySQL root password is not blank, update the connection settings in:
- `link/config.php`
- Any individual files using `mysqli_connect` (e.g., `delete_users.php`, etc.)

### 5. Launch the Application
Move the project folder to `C:\xampp\htdocs\`.
Access the application via: `http://localhost/disease/`

---

## 🔐 Credentials

| User Type | Username | Password |
| :--- | :--- | :--- |
| **Admin** | `admin` | `Ab123456` |
| **User** | `user` | `Ab123456` |

---

## ⚠️ Important Cautions

> [!WARNING]  
> **Medical Disclaimer**: This application is for educational and informational purposes only. It is **not** a substitute for professional medical advice, diagnosis, or treatment. Always seek the advice of your physician or other qualified health providers with any questions you may have regarding a medical condition.

- **Scope**: Currently focuses on the front part of the body and general symptoms.
- **Accuracy**: Predictions are based on the symptoms provided and may not be 100% accurate.

---



---

## 📸 Project Preview

![Front Page](images/1.PNG)
*Initial Landing Page*

![Symptoms Selection](images/5.PNG)
*Interactive Body Part Selection*

![Analysis Result](images/8.PNG)
*Diagnostic Result Output*

---

<p align="center">Made with ❤️ for Healthcare Awareness</p>

