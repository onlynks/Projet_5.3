# Projet_5.3
The manual installation (time estimation: ~5-10 minuts)

Blog installation

Clone the repository:

git clone https://github.com/opportus/blog.git /path/to/my/blog
Install the dependencies:

composer --working-dir="/path/to/my/blog" install
MySql environment setup

Create the database:

mysql -u ${mysql_root_name} -p${mysql_root_password} -e "CREATE DATABASE ${mysql_db_name} CHARACTER SET = 'utf8' COLLATE = 'utf8_general_ci';"
Create its user and grant privileges:

mysql -u ${mysql_root_name} -p${mysql_root_password} -e "CREATE USER ${mysql_db_user}@${mysql_db_host} IDENTIFIED BY '${mysql_db_pass}';"
mysql -u ${mysql_root_name} -p${mysql_root_password} -e "GRANT ALL PRIVILEGES ON ${mysql_db_name}.* TO '${mysql_db_user}'@'${mysql_db_host}';"
mysql -u ${mysql_root_name} -p${mysql_root_password} -e "FLUSH PRIVILEGES;"
Create the post table:

mysql -u ${mysql_root_name} -p${mysql_root_password} -e "USE ${mysql_db_name};
	CREATE TABLE post
	(
		id bigint unsigned NOT NULL AUTO_INCREMENT,
		slug varchar(254) NOT NULL,
		author varchar(50) NOT NULL,
		created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
		updated_at datetime,
		title varchar(255),
		excerpt tinytext,
		content longtext,
		CONSTRAINT pk_post_id PRIMARY KEY (id)
	);
	CREATE UNIQUE INDEX ix_post_slug ON post (slug);"
Blog configuration

Define configuration constants in /path/to/my/blog/src/config.php...

You're done.
