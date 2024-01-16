<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *             title="API Studio Ghibli",
 *             version="1.0",
 *             description="API para frontend https://studio-ghilbli.onrender.com/"
 * )
 *
 * @OA\Server(url="http://127.0.0.1:8000/")
 *
 *
 * Login
 * @OA\Post (
 *     path="/api/login",
 *     tags={"login"},
 *     security={{"basicAuth":{}}},
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *              @OA\Property(
 *                  property="error",
 *                  type="boolean",
 *                  example="false"
 *              ),
 *              @OA\Property(
 *                  property="message",
 *                  type="string",
 *                  example="OK"
 *              ),
 *              @OA\Property(
 *                  type="object",
 *                  property="data",
 *                  @OA\Property(
 *                      property="token",
 *                      type="string",
 *                      example="8|C7T9L6rpAgpByVCNWC1JdHdyrF0LarLeA8hl1mWl5431dd8e"
 *                  ),
 *                  @OA\Property(
 *                      type="array",
 *                      property="scope",
 *                      @OA\Items(
 *                          type="string",
 *                          example={"user_delete", "user_edit", "movie_fav"},
 *                      ),
 *                  ),
 *              ),
 *              @OA\Property(
 *                  type="object",
 *                  property="user",
 *                  @OA\Property(
 *                      property="name",
 *                      type="string",
 *                      example="John"
 *                  ),
 *                  @OA\Property(
 *                      property="email",
 *                      type="string",
 *                      example="john@gmail.com"
 *                  ),
 *              ),
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized",
 *         @OA\JsonContent(
 *              @OA\Property(
 *                  property="error",
 *                  type="boolean",
 *                  example="true"
 *              ),
 *              @OA\Property(
 *                  property="message",
 *                  type="string",
 *                  example="Invalid credentials."
 *              ),
 *         )
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Bad Request",
 *         @OA\JsonContent(
 *              @OA\Property(
 *                  property="error",
 *                  type="boolean",
 *                  example="true"
 *              ),
 *              @OA\Property(
 *                  property="message",
 *                  type="string",
 *                  example="Internal Error."
 *              ),
 *         )
 *      )
 * )
 *
 * List of directors and producers by film
 * @OA\Get (
 *     path="/api/producers_directors",
 *     tags={"producers directors"},
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *              @OA\Property(
 *                  property="error",
 *                  type="boolean",
 *                  example="false"
 *              ),
 *              @OA\Property(
 *                  property="message",
 *                  type="string",
 *                  example="OK"
 *              ),
 *              @OA\Property(
 *                  property="id_movie",
 *                  type="string",
 *                  example="2baf70d1-42bb-4437-b551-e5fed5a87abe"
 *              ),
 *              @OA\Property(
 *                  property="video_id",
 *                  type="string",
 *                  example="8ykEy-yPBFc?si=AUBhajALlYSRJ8YA"
 *              ),
 *             @OA\Property(
 *                 type="array",
 *                 property="data",
 *                 @OA\Items(
 *                     type="object",
 *                     @OA\Property(
 *                         property="producer",
 *                         type="array",
 *                         @OA\Items(
 *                              @OA\Property(
 *                                  property="name",
 *                                  type="string",
 *                                  example="Isao Takahata"
 *                              ),
 *                                  @OA\Property(
 *                                  property="url",
 *                                  type="string",
 *                                  example="producer_director\/Hayao_Miyazaki.jpg"
 *                              ),
 *                          )
 *                     ),
 *                     @OA\Property(
 *                         property="director",
 *                         type="array",
 *                         @OA\Items(
 *                              @OA\Property(
 *                                  property="name",
 *                                  type="string",
 *                                  example="Hayao Miyazaki"
 *                              ),
 *                                  @OA\Property(
 *                                  property="url",
 *                                  type="string",
 *                                  example="producer_director\/Hayao_Miyazaki.jpg"
 *                              ),
 *                          )
 *                     ),
 *                 )
 *             )
 *         )
 *     ),
 *  @OA\Response(
 *         response=500,
 *         description="Bad Request",
 *         @OA\JsonContent(
 *              @OA\Property(
 *                  property="error",
 *                  type="boolean",
 *                  example="true"
 *              ),
 *              @OA\Property(
 *                  property="message",
 *                  type="string",
 *                  example="Internal Error."
 *              ),
 *         )
 *      )
 * )
 *
 * Create user
 * @OA\Post (
 *     path="/api/user",
 *     tags={"user"},
 *     @OA\RequestBody(
 *       required=true,
 *       @OA\MediaType(
 *         mediaType="application/x-www-form-urlencoded",
 *         @OA\Schema(
 *           @OA\Property(
 *             property="name",
 *             description="The name field is required..",
 *             type="string",
 *           ),
 *           @OA\Property(
 *             property="email",
 *             description="The email field is required.",
 *             type="string",
 *           ),
 *           @OA\Property(
 *             property="pwss",
 *             description="The password field is required.",
 *             type="password",
 *           ),
 *         ),
 *       ),
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="OK",
 *         @OA\JsonContent(
 *              @OA\Property(
 *                  property="error",
 *                  type="boolean",
 *                  example="false"
 *              ),
 *              @OA\Property(
 *                  property="message",
 *                  type="string",
 *                  example="created user, verify your email and activate your account."
 *              ),
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Bad Request",
 *         @OA\JsonContent(
 *              @OA\Property(
 *                  property="error",
 *                  type="boolean",
 *                  example="true"
 *              ),
 *              @OA\Property(
 *                  property="message",
 *                  type="string",
 *                  example="The name field is required. | The email field is required. | The password field is required. | The email already exists"
 *              ),
 *         )
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Bad Request",
 *         @OA\JsonContent(
 *              @OA\Property(
 *                  property="error",
 *                  type="boolean",
 *                  example="true"
 *              ),
 *              @OA\Property(
 *                  property="message",
 *                  type="string",
 *                  example="Internal Error."
 *              ),
 *         )
 *      )
 * )
 *
 * Update user
 * @OA\Put (
 *     path="/api/user/update",
 *     tags={"user"},
 *     security={{"sanctum":{"Bearer"}}},
 *     @OA\RequestBody(
 *       @OA\MediaType(
 *         mediaType="application/x-www-form-urlencoded",
 *         @OA\Schema(
 *           @OA\Property(
 *             property="name",
 *             description="The name field is optional",
 *             type="string",
 *           ),
 *           @OA\Property(
 *             property="email",
 *             description="The email field is optional",
 *             type="string",
 *           ),
 *           @OA\Property(
 *             property="pwss",
 *             description="The password field is optional",
 *             type="password",
 *           ),
 *         ),
 *       ),
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *              @OA\Property(
 *                  property="error",
 *                  type="boolean",
 *                  example="false"
 *              ),
 *              @OA\Property(
 *                  property="message",
 *                  type="string",
 *                  example="Update user."
 *              ),
 *         )
 *     ),
 *     @OA\Response(
 *         response=403,
 *         description="Forbidden",
 *         @OA\JsonContent(
 *              @OA\Property(
 *                  property="error",
 *                  type="boolean",
 *                  example="true"
 *              ),
 *              @OA\Property(
 *                  property="message",
 *                  type="string",
 *                  example="Unauthorized."
 *              ),
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Bad Request",
 *         @OA\JsonContent(
 *              @OA\Property(
 *                  property="error",
 *                  type="boolean",
 *                  example="true"
 *              ),
 *              @OA\Property(
 *                  property="message",
 *                  type="string",
 *                  example="The email already exists."
 *              ),
 *         )
 *      ),
 *     @OA\Response(
 *         response=500,
 *         description="Bad Request",
 *         @OA\JsonContent(
 *              @OA\Property(
 *                  property="error",
 *                  type="boolean",
 *                  example="true"
 *              ),
 *              @OA\Property(
 *                  property="message",
 *                  type="string",
 *                  example="Internal Error."
 *              ),
 *         )
 *      )
 * )
 *
 * Delete user
 * @OA\Delete (
 *     path="/api/user",
 *     tags={"user"},
 *     security={{"sanctum":{"Bearer"}}},
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *              @OA\Property(
 *                  property="error",
 *                  type="boolean",
 *                  example="false"
 *              ),
 *              @OA\Property(
 *                  property="message",
 *                  type="string",
 *                  example="deleted user"
 *              ),
 *         )
 *     ),
 *     @OA\Response(
 *         response=403,
 *         description="Forbidden",
 *         @OA\JsonContent(
 *              @OA\Property(
 *                  property="error",
 *                  type="boolean",
 *                  example="true"
 *              ),
 *              @OA\Property(
 *                  property="message",
 *                  type="string",
 *                  example="Unauthorized."
 *              ),
 *         )
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Bad Request",
 *         @OA\JsonContent(
 *              @OA\Property(
 *                  property="error",
 *                  type="boolean",
 *                  example="true"
 *              ),
 *              @OA\Property(
 *                  property="message",
 *                  type="string",
 *                  example="Internal Error."
 *              ),
 *         )
 *      )
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
