<?php
require_once __DIR__ . '/../utils/JWTHandler.php';

class RoleMiddleware {
    public static function requireRole($role) {
        $headers = function_exists('getallheaders') ? getallheaders() : [];
        if (!isset($headers['Authorization'])) {
            http_response_code(401);
            echo json_encode(['error' => 'No token provided']);
            exit;
        }
        $token = str_replace('Bearer ', '', $headers['Authorization']);
        $jwt = new JWTHandler();
        $payload = $jwt->decodeToken($token);
        if (!$payload || !isset($payload['role']) || $payload['role'] !== $role) {
            http_response_code(403);
            echo json_encode(['error' => 'Forbidden']);
            exit;
        }
        // Nếu hợp lệ, cho phép tiếp tục
    }
}
