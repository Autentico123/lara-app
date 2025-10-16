# 🔗 TradeLink

> **Connect. Trade. Thrive.**  
> An online trading and communication system built with Laravel 12 and Tailwind CSS 4.0

[![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=flat&logo=laravel)](https://laravel.com)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind-4.0-38B2AC?style=flat&logo=tailwind-css)](https://tailwindcss.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat&logo=php)](https://php.net)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)

---

## 📖 About TradeLink

TradeLink is a simple, user-friendly online trading platform that connects buyers and sellers. Built with modern web technologies, it enables users to:

-   📦 **Post Items** - Share products for trade or sale with detailed descriptions
-   🔍 **Browse Listings** - Discover items through search, filters, and categories
-   💬 **Connect Instantly** - Reach sellers via Facebook and Messenger links
-   ❤️ **Save Favorites** - Bookmark items you're interested in
-   📝 **Leave Comments** - Engage with sellers and ask questions
-   👤 **Manage Profile** - Track your items, favorites, and trading activity
-   🛡️ **Admin Dashboard** - Monitor users, items, and reports

**Project Goal:** Make online trading faster, easier, and more interactive without complex payment systems or third-party integrations.

## ✨ Key Features

### For Users

-   **User Authentication** - Secure login and registration (Laravel Breeze)
-   **Item Management** - Full CRUD operations for trading items
-   **Advanced Search** - Filter by category, price, location, and keywords
-   **Social Integration** - Direct contact via Facebook and Messenger
-   **Favorites System** - Save and track interesting items
-   **Comment & Reviews** - Engage with sellers and buyers
-   **User Dashboard** - Personalized trading hub
-   **Responsive Design** - Optimized for mobile, tablet, and desktop

### For Administrators

-   **Admin Panel** - Comprehensive dashboard with analytics
-   **User Management** - View, manage, and moderate users
-   **Item Moderation** - Review and remove inappropriate posts
-   **Reports System** - Handle flagged items and disputes
-   **Analytics** - Track platform activity and user engagement

---

## 🛠️ Tech Stack

-   **Backend:** Laravel 12 (PHP 8.2+)
-   **Frontend:** Blade Templates with Alpine.js
-   **Styling:** Tailwind CSS 4.0
-   **Database:** MySQL
-   **Authentication:** Laravel Breeze
-   **Build Tool:** Vite
-   **Version Control:** Git

---

## 📋 Prerequisites

Before you begin, ensure you have the following installed:

-   PHP 8.2 or higher
-   Composer
-   Node.js 18+ and npm
-   MySQL 8.0+
-   Git

---

## 🚀 Installation

Follow these steps to set up TradeLink locally:

### 1. Clone the Repository

```bash
git clone <repository-url>
cd lara-app
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Install Node Dependencies

```bash
npm install
```

### 4. Environment Configuration

Copy the example environment file:

```bash
cp .env.example .env
```

Update your `.env` file with your database credentials:

```env
APP_NAME=TradeLink
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tradelink_db
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Run Database Migrations

```bash
php artisan migrate
```

This will create all necessary tables:

-   users (with social media links)
-   items
-   favorites
-   comments
-   reports
-   notifications

### 7. Build Frontend Assets

```bash
npm run build
```

For development with hot reload:

```bash
npm run dev
```

### 8. Start the Development Server

```bash
php artisan serve
```

Visit [http://localhost:8000](http://localhost:8000) in your browser.

---

## 📁 Project Structure

```
lara-app/
├── app/
│   ├── Http/Controllers/    # Application controllers
│   ├── Models/              # Eloquent models
│   └── View/Components/     # Blade components
├── database/
│   ├── migrations/          # Database migrations
│   ├── seeders/            # Database seeders
│   └── factories/          # Model factories
├── documents/
│   ├── ProjectGuide.md     # Complete project documentation
│   ├── DesignConcepts.md   # UI/UX design system
│   └── TaskList.md         # Development roadmap
├── resources/
│   ├── css/                # Stylesheets (Tailwind)
│   ├── js/                 # JavaScript files
│   └── views/              # Blade templates
├── routes/
│   ├── web.php             # Web routes
│   └── auth.php            # Authentication routes
└── public/                 # Public assets
```

---

## 🎨 Design System

TradeLink follows a comprehensive design system with:

-   **Brand Colors:** TradeLink Blue (#3B82F6), Trade Teal (#14B8A6), Deal Orange (#F59E0B)
-   **Typography:** Inter font family with defined type scales
-   **Components:** Reusable Blade components for consistency
-   **Responsive:** Mobile-first design approach
-   **Accessibility:** WCAG AA compliant color contrasts

See [DesignConcepts.md](documents/DesignConcepts.md) for complete guidelines.

---

## 🗂️ Database Schema

### Main Tables

-   **users** - User accounts with social media links
-   **items** - Posted trading items
-   **favorites** - User's saved items
-   **comments** - Item discussions
-   **reports** - Flagged content
-   **notifications** - User alerts

See [ProjectGuide.md](documents/ProjectGuide.md) for detailed schema and relationships.

---

## 🧪 Testing

Run the test suite:

```bash
php artisan test
```

Run specific test types:

```bash
# Feature tests
php artisan test --testsuite=Feature

# Unit tests
php artisan test --testsuite=Unit
```

---

## 🚀 Deployment

### Production Checklist

1. Set `APP_ENV=production` in `.env`
2. Set `APP_DEBUG=false` in `.env`
3. Run `php artisan config:cache`
4. Run `php artisan route:cache`
5. Run `php artisan view:cache`
6. Run `npm run build` for optimized assets
7. Set up SSL certificate (HTTPS)
8. Configure proper database credentials
9. Set up automated backups
10. Configure error logging

---

## 🤝 Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

---

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

## 👥 Team

Built with ❤️ by the TradeLink Development Team

---

## 📞 Support

For questions or support:

-   Create an [issue](../../issues)
-   Read the [documentation](documents/)
-   Check [Laravel docs](https://laravel.com/docs)

---

**TradeLink** - _Connect. Trade. Thrive._
