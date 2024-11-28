<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static AVAILABLE()
 * @method static static OCCUPIED()
 * @method static static MAINTENANCE()
 */
final class RoomStatus extends Enum
{
    const AVAILABLE = 'available';
    const OCCUPIED = 'occupied';
    const MAINTENANCE = 'maintenance';

    /**
     * Lấy mô tả của trạng thái.
     *
     * @param string $value
     * @return string
     */
    public static function getDescription($value): string
    {
        switch ($value) {
            case self::AVAILABLE:
                return 'Phòng trống';
            case self::OCCUPIED:
                return 'Đang được sử dụng';
            case self::MAINTENANCE:
                return 'Đang bảo trì';
            default:
                return 'Không xác định';
        }
    }
}
