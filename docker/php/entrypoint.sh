# Periksa koneksi ke database sebelum menjalankan migrasi
echo "Menunggu database siap..."
until php artisan db:wait; do
    sleep 2
done

# Jalankan migrasi database
echo "Menjalankan migrasi database..."
php artisan migrate --force

# Jalankan seeding database
echo "Menjalankan seeding database..."
php artisan db:seed --force

# Jalankan PHP-FPM
echo "Menjalankan PHP-FPM..."
exec php-fpm
