# Product Catalog API Documentation  

This documentation provides details on the available API endpoints for the **Product Catalog API**.  

---

## **Base URL**  

http://productcatalog.com/api/


---

## **Endpoints**  

### **1. Get a Single Product**
**Endpoint:**  

GET /api/products/{id}

**Query Parameters (Optional):**  

| Parameter     | Type   | Description                          |
|--------------|--------|--------------------------------------|
| `id` | int    | The ID of the product       |

**Response Example:**  
```json
{
    "id": 1,
    "name": "Sample Product",
    "description": "This is a sample product",
    "sku": "SKU1234",
    "price": 99.99,
    "category_id": 2,
    "created_at": "2025-03-01T12:00:00.000Z",
    "updated_at": "2025-03-01T12:00:00.000Z"
}

```
### **2. Create a Product**
**Endpoint:**  

POST /api/products

**Query Parameters (Optional):**  

| Parameter     | Type   | Description                          |
|--------------|--------|--------------------------------------|
| `name` | int    | Name of the product       |
| `description`     | Product description |
| `sku`     | int | Unique SKU identifier |
| `price`     | float | Price of the product |
| `category_id`     | int | Associated category ID |

**Example Request Body:**  
```json
{
    "name": "New Product",
    "description": "A new test product",
    "sku": "TEST123",
    "price": 49.99,
    "category_id": 2
}
```

**Example Request Body:**  

```json
{
    "message": "Product created successfully",
    "product": {
        "id": 1,
        "name": "New Product",
        "description": "A new test product",
        "sku": "TEST123",
        "price": 49.99,
        "category_id": 1,
        "created_at": "2025-03-01T12:30:00.000Z",
        "updated_at": "2025-03-01T12:30:00.000Z"
    }
}

```
### **3. Update a Product**
**Endpoint:**  

PUT /api/products/{id}

**Query Parameters (Optional):**  

| Parameter     | Type   | Description                          |
|--------------|--------|--------------------------------------|
| `id` | int    | The ID of the product      |

**Request Body: (Partial updates allowed)**  
```json
{
    "name": "Updated Product Name",
    "price": 79.99
}
```

**Response Example:**  
```json
{
    "message": "Product updated successfully",
    "product": {
        "id": 1,
        "name": "Updated Product Name",
        "description": "This is a sample product",
        "sku": "SKU1234",
        "price": 79.99,
        "category_id": 2,
        "created_at": "2025-03-01T12:00:00.000Z",
        "updated_at": "2025-03-01T12:45:00.000Z"
    }
}

```

### **4. Delete a Product**
**Endpoint:**  

DELETE /api/products/{id}

**Query Parameters (Optional):**  

| Parameter     | Type   | Description                          |
|--------------|--------|--------------------------------------|
| `id` | int    | The ID of the product      |

**Response Example:**  
```json
{
    "message": "Product deleted successfully"
}
```

### **5. Get All Categories**
**Endpoint:**  

GET /api/categories

**Response Example:** 
```json
{
    "categories": [
        {
            "id": 1,
            "name": "Electronics",
            "parent_category_id": null
        }
    ]
}
```

### **6. Get All Products**
**Endpoint:**  

GET /api/products

**Response Example:** 
```json
{
    "categories": [
        {
            "id": 1,
            "name": "Updated Product Name",
            "description": "This is a sample product",
            "sku": "SKU1234",
            "price": 79.99,
            "category_id": 2,
            "created_at": "2025-03-01T12:00:00.000Z",
            "updated_at": "2025-03-01T12:45:00.000Z"
        }
    ]
}
```

### **Error Responses**

| Status Code     | Meaning   | Example Response                          |
|--------------|--------|--------------------------------------|
| `400` | 	Bad Request    | ```json	{"error": "Invalid input data"} ```       |
| `404`     | Not Found | ```json	{"error": "Product not found"} ```  |
| `500`     | Internal Server Error | ```json	{"error": "Something went wrong"} ```   |

