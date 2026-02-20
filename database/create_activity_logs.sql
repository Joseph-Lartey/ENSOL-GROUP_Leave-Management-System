USE ensol_lms;

CREATE TABLE IF NOT EXISTS activity_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    actor_id INT NOT NULL,
    action_type ENUM('login','logout','role_change','user_add','user_remove','permission_change','user_update') NOT NULL,
    target_id INT,
    target_type VARCHAR(50),
    details TEXT,
    ip_address VARCHAR(45),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (actor_id) REFERENCES users(id)
);
