# #!/bin/bash

# # Menunggu database siap sebelum melanjutkan
# echo "Menunggu database siap..."
# until php artisan db:wait; do
#     sleep 2
# done

# # Jalankan migrasi database
# echo "Menjalankan migrasi database..."
# php artisan key:generate --force
# php artisan migrate --force

# # Jalankan seeding database jika diperlukan
# echo "Menjalankan seeding database..."
# php artisan db:seed --force

# Jalankan PHP-FPM
echo "Menjalankan PHP-FPM..."
exec php-fpm
