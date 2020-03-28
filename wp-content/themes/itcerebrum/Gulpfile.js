
// Загрузка плагинов
var gulp = require('gulp');
var concatenate = require('gulp-concat-css');
var minify = require('gulp-cssmin');
// Конфигурация задач
gulp.task('default', function(done) {
    gulp.src('src/*.css')
    // Конкатенация css файлов в директории src
        .pipe(concatenate('styles.min.css'))
        // Сжатие файлов CSS
        .pipe(minify())
        // Сохранение сжатого файла с директории css
        .pipe(gulp.dest('css/'));
    done()
});
// Использование команды `gulp` для запуска задач
