<?php

namespace app\models;

use yii\data\ActiveDataProvider;

/**
 * CategorySearch represents the model behind the search form of `app\models\Category`.
 */
class CategorySearch extends Category
{
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 60]
        ];
    }

    public function search(array $params)
    {
        $query = Category::find()
            ->orderBy('name ASC');

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
