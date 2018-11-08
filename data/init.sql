create DATABASE thandi_todo;

use thandi_todo;

create TABLE Todos (
id INT(6) not null PRIMARY KEY auto_increment,
task VARCHAR(255) NOT NULL,
completed boolean default false,
due_date TIMESTAMP default current_timestamp,
created_at TIMESTAMP default current_timestamp,
updated_at TIMESTAMP default current_timestamp
);
