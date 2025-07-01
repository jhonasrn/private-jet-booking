# ✈️ Flight Reservation Admin System

This project is a web-based admin panel for managing private flight reservations. Built with Laravel, it enables administrators and pilots to monitor operations, view analytics, and manage assignments through a clear and efficient interface.

## 🎯 Objective

Provide a secure and user-friendly platform for managing and tracking flight reservations — from assignment to completion — while offering summarized insights by pilot, month, and jet model.

---

## 👤 User Roles

- **Admin**
  - Full access to all dashboards, reports, and user management.
  - Can assign pilots to flights and oversee the reservation workflow.

- **Pilot**
  - Sees only their own assigned flights.
  - Can update the status of their reservations.

---

## ⚙️ Features

### Reports section (basic summaries):

- **Completed Flights**  
  Shows completed reservations grouped by pilot and month.

- **Assigned Flights**  
  Displays assigned flights grouped by pilot and month.

- **Unassigned Flights**  
  Lists reservations not yet assigned to a pilot (or marked as pending), grouped by month.

- **Flights by Jet Model**  
  Counts total reservations per aircraft model.

---

## 💻 Tech Stack

- **Backend:** Laravel 12.x (PHP 8.4+)
- **Frontend:** Blade templates, Tailwind CSS
- **Database:** MySQL / MariaDB
- **Access Control:** Role-based via middleware
