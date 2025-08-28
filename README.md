# Karang Taruna Profile Website with Admin Panel

This is a web-based information system for **Karang Taruna**, designed to present organizational information, programs, and activities to the public, while providing an admin panel for content management.

---

## 🎯 Key Features

* **Dynamic Content Management**
  Admins can perform *CRUD* (Create, Read, Update, Delete) operations on Programs, News, Gallery, and Organizational Structure.

* **Responsive Public Pages**

  * Display About Us (Vision & Mission), Organizational Structure, Programs & Activities, Photo Gallery, and Latest News.
  * Modern and responsive design using **Tailwind CSS**.
  * Smooth animations with **AOS (Animate On Scroll)**.

* **User Interactivity**

  * Contact form for visitors to send messages.
  * *Lightbox* feature in the gallery for image enlargement.
  * Social media sharing buttons on program and news detail pages.

* **Functional Admin Panel**

  * Interactive dashboard showing summarized data.
  * Collapsible sidebar for easy navigation.
  * Structured content management for all main sections.
  * **User authentication using Laravel Breeze**, providing secure login, registration, and password management.

* **Website Settings**
  Admins can update basic website information such as Site Name, Logo, Address, Contact, and social media links through the admin panel.

---

## 👥 User Roles

### 1. Admin

* Manage all website content (Programs, News, Gallery, Organizational Structure, etc.).
* Manage general website settings.
* View messages received from the contact form.
* Full access to all admin panel features.
* Login using **Laravel Breeze authentication system**.

### 2. Visitors (Public)

* View all information displayed on the main pages.
* Send messages through the contact form.
* View program and news details.
* Explore archives of programs, news, and gallery pages with pagination.

---

## 📦 System Flow

1. **Initial Setup**
   Admin configures basic website information, such as site name, logo, and contact details, through the **Website Settings** menu.

2. **Content Management**
   Admin adds, edits, or deletes data such as Organizational Members, Programs, Gallery, and News through their respective menus in the admin panel.

3. **Public Display**
   Data managed by the admin is automatically displayed on the main pages and related pages for visitors.

4. **Visitor Interaction**
   Visitors can send messages through the contact form, which are stored under **Incoming Messages** in the admin panel.

---

## 🛠️ Technologies Used

* **Backend:** Laravel 12 + **Breeze (Authentication)**
* **Frontend:**

  * *Blade* (Laravel templating engine)
  * **Tailwind CSS**
  * **Alpine.js** (for interactivity)
  * **AOS (Animate On Scroll)** (for animations)
* **Database:** MySQL

---

