use Capstone;

CREATE TABLE users(
User_id varchar(64) not null,
f_name text not null,
l_name text not null,
u_name varchar(16) not null UNIQUE,
password text not null,
question text not null,
answer text not null,
PRIMARY KEY(User_id)
);

CREATE TABLE msg(
msg_id int AUTO_INCREMENT not null,
sender_id varchar(129) not null,
receiver_id varchar(129) not null,
msg_txt text,
state int,
FOREIGN KEY (sender_id)REFERENCES users(User_id),
FOREIGN KEY (receiver_id)REFERENCES users(User_id),
PRIMARY KEY(msg_id)
);