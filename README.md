
# lessonLMS - A Custom WordPress LMS Theme

**lessonLMS** is a custom-built, lightweight WordPress theme that transforms your site into a personal Learning Management System (LMS). It is not dependent on heavy third-party plugins; instead, it leverages core WordPress functions (like Custom Post Types, Meta Boxes, and the Customizer API) to ensure maximum performance and flexibility.

This project serves as a perfect example of advanced WordPress theme development concepts, including AJAX, custom data handling, and building interactive admin widgets.

## 🚀 Live Demo

View the live project demo here: **[https://your-live-project-link.com](https://www.google.com/search?q=https://your-live-project-link.com)**

---

## 📖 Table of Contents

- [Key Features](https://www.google.com/search?q=%23-key-features)
    
- [Technologies Used](https://www.google.com/search?q=%23-technologies-used)
    
- [Installation Guide](https://www.google.com/search?q=%23-installation-guide)
    
- [Theme File Structure](https://www.google.com/search?q=%23-theme-file-structure)
    
- [Contact](https://www.google.com/search?q=%23-contact)
    

---

## ✨ Key Features

This theme is packed with custom-coded features required for a modern LMS:

- **"Course" Custom Post Type:** A dedicated `course` post type allows for easy creation and management of courses directly from the admin dashboard.
    
- **Custom Meta Boxes:** Each course includes a comprehensive meta box to store details like Price, Original Price, Video Hours, Article Count, Language, Subtitles, and lists for "What You'll Learn," "Requirements," and "Target Audience."
    
- **AJAX-Based Enrollment:** Users can enroll in courses with a single click, without a page reload. This is powered by the WordPress AJAX API (`wp_ajax_`).
    
- **Custom Review System:** Students can submit ratings and reviews for courses. The theme automatically calculates and displays the average rating and total review count.
    
- **Full Theme Customizer Support:** The `WP_Customize_API` is used extensively, allowing admins to edit most sections of the theme (Hero, Features, CTA, Blog, Footer) directly from the live customizer.
    
- **Admin Dashboard Widget:** A custom dashboard widget shows "at-a-glance" enrollment statistics, including total enrollments and a list of the most recent student sign-ups.
    
- **Modular File Structure:** The theme's frontend sections (e.g., `hero.php`, `features.php`) are neatly organized in a `sections/` folder for clean and maintainable code.
    
- **Custom Menus & Sidebars:** Registered multiple menu locations (Primary, Mobile, Footer) and a dedicated "Blog Sidebar" widget area.
    

---

## 🛠️ Technologies Used

- **Backend:** PHP (OOP Principles)
    
- **WordPress APIs:** Custom Post Type (CPT) API, Meta Box API, Customizer API, AJAX API, Widgets API, Transients API (implied for performance)
    
- **Frontend:** JavaScript (jQuery), AJAX
    
- **Styling:** CSS3, Slick Slider, Boxicons, Font Awesome
    
- **Database:** MySQL (via core WordPress functions like `get_post_meta`, `$wpdb`)
    
- **Tools:** Git, VS Code
    

---

## ⚙️ Installation Guide

Follow these steps to set up the `lessonLMS` theme on your WordPress installation:

1. **Clone the Repository:**
    
    Bash
    
    ```
    git clone https://github.com/[your-username]/lessonLMS.git
    ```
    
2. Upload Theme:
    
    Upload the entire lessonLMS folder to your WordPress installation's wp-content/themes/ directory.
    
3. Activate Theme:
    
    In your WordPress dashboard, navigate to Appearance > Themes. Find lessonLMS and click "Activate".
    
4. Flush Permalinks (Crucial Step):
    
    After activation, navigate to Settings > Permalinks. Do not change anything; just click the "Save Changes" button. This is essential to register the course custom post type slug and prevent "404 Not Found" errors.
    
5. **Initial Setup:**
    
    - Go to `Appearance > Menus` to set up your navigation.
        
    - Go to `Appearance > Customize` to update the Hero, Footer, and other sections.
        
    - Go to `Appearance > Widgets` to populate your Blog Sidebar.
        
    - Start adding new courses from the `Courses > Add New Course` menu in your dashboard.
        

---

## 📂 Theme File Structure

Based on the provided directory image, the theme is organized as follows:

```
lessonLMS/
│
├── assets/
│   ├── css/
│   │   ├── responsive.css
│   │   └── style.css
│   ├── images/
│   └── js/
│       └── script.js
│
├── sections/
│   ├── blog.php
│   ├── courses.php
│   ├── cta.php
│   ├── features.php
│   ├── hero.php
│   └── testimonials.php
│
├── archive-course.php
├── footer.php
├── functions.php
├── header.php
├── index.php
├── page.php
├── search.php
├── sidebar.php
├── single-course.php
└── style.css
```

---

## 📫 Contact

Developed by **[Md. Nayemur Rahman]**

- **Email:** [nayemspecial@gmail.com]
    
- **LinkedIn:** [[linkedin.com/in/your-profile](https://linkedin.com/in/nayemspecial)]
    
    
