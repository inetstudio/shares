<?php

namespace InetStudio\SharesPackage\Shares\Http\Requests\Back;

use Illuminate\Foundation\Http\FormRequest;
use InetStudio\SharesPackage\Shares\Contracts\Http\Requests\Back\SaveItemRequestContract;

/**
 * Class SaveItemRequest.
 */
class SaveItemRequest extends FormRequest implements SaveItemRequestContract
{
    /**
     * Определить, авторизован ли пользователь для этого запроса.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Сообщения об ошибках.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'user_id.exists' => 'Пользователь с указанным параметром id не существует',
        ];
    }

    /**
     * Правила проверки запроса.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'user_id' => 'nullable|exists:users,id',
        ];
    }
}
