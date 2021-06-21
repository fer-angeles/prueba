const { src, dest } = require('gulp');
const clean         = require('gulp-clean');

function bootstrap()
{
	src([
		'node_modules/bootstrap/dist/js/bootstrap.min.js'
	])
		.pipe(dest('assets/widgets/bootstrap/js'));

	src([
		'node_modules/bootstrap/dist/css/bootstrap.min.css'
	])
		.pipe(dest('assets/widgets/bootstrap/css'));

	src([
		'node_modules/bootstrap/dist/fonts/**/*'
	])
		.pipe(dest('assets/widgets/bootstrap/fonts'));

}

function jqueryadd()
{
	src([
		'node_modules/jquery/dist/jquery.min.js'
	])
		.pipe(dest('assets/widgets/jquery/'));
}

function cleanfolder()
{
	src('assets/widgets')
		.pipe(clean({force: true}));
}

function defaultTask(cb)
{
	bootstrap();
	jqueryadd();
	cb();
}

exports.default = defaultTask;
exports.cleanfolder = cleanfolder;
